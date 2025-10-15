<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\ProgramJob;
use App\ProgramJobCategory;
use App\Program;

class ProgramCareerTable extends Component
{
    public $jobs;
    public $categories ;
	public $program;
    public function __construct($jobs)
    {
		$this->program = Program::find($jobs);
        $this->jobs = ProgramJob::where('program_id',$jobs)->get();
        $this->categories = ProgramJobCategory::where('program_id',$jobs)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.program-career-table');
    }
}
