<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ExamController extends Controller
{
    public function showExamForm()
    {
        // Check if the user has already taken an exam
        if (auth()->user()->exams()->count() > 0) {
            return redirect()->route('frontend.frontSubscription.englishTest.exam.result', ['exam' => auth()->user()->exams->first()]);
        }

        $easyQuestions = Test::where('category', 'easy')->inRandomOrder()->limit(10)->get();
        $mediumQuestions = Test::where('category', 'medium')->inRandomOrder()->limit(10)->get();
        $hardQuestions = Test::where('category', 'hard')->inRandomOrder()->limit(10)->get();

        $allQuestions = $easyQuestions->merge($mediumQuestions)->merge($hardQuestions);
        $shuffledQuestions = $allQuestions->shuffle();

        return view('exams.form', compact('shuffledQuestions'));
    }


    public function submitExam(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Check if the user has already taken an exam
        if (auth()->user()->exams()->count() > 0) {
            return redirect()->route('frontend.frontSubscription.englishTest.exam.result', ['exam' => auth()->user()->exams->first()]);
        }

        try {
            $this->validate($request, [
                'question_ids' => 'required|array',
                'question_ids.*' => 'in:first_choice,second_choice,third_choice,fourth_choice',
            ]);

            $exam = Exam::create(['user_id' => auth()->user()->id]);

            // Attach questions to the exam
            foreach ($request->input('question_ids') as $questionId => $choice) {
                $exam->questions()->attach($questionId, ['selected_choice' => $choice]);
            }

            // Calculate the score
            $score = $this->calculateScore($exam);
            $exam->update(['score' => $score]);

            return redirect()->route('frontend.frontSubscription.englishTest.exam.result', ['exam' => $exam]);

        } catch (ValidationException $exception) {
            // Handle validation failure
            return redirect()->back()->withErrors(['error' => 'Please answer all questions before submitting the exam.']);
        }
    }




    public function showResult(Exam $exam)
    {
        return view('exams.result', compact('exam'));
    }

    private function calculateScore(Exam $exam)
    {
        $totalScore = 0;



        foreach ($exam->questions as $question) {
            $correctChoice = $question->correct_answer;
            $selectedChoice = $question->pivot->selected_choice;

            if ($correctChoice === $selectedChoice) {
                $totalScore++;
            }
        }

        return $totalScore;
    }
}
