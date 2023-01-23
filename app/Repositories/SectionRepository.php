<?php

namespace App\Repositories;

use App\Models\Section;
use App\Repositories\Contracts\SectionInterface;

class SectionRepository implements SectionInterface
{

	private $_request;
    private $_section;

	public function __construct(Section $section)
	{

		$this->_request = app('request');
        $this->_section = $section;
	}

	public function first()
	{
		return $this->_section->where('section_name', $this->_request->name)->firstOrFail();
	}

    public function update($id)
	{
        $section = $this->_section->findOrFail($id);
        $section->content = $this->_request->except(['_token', '_method', 'image']);
        $section->image = $this->_request->image;
		$section->save();

        return $section;
	}

}
