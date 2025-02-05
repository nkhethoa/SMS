<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*    
*/
class Home_calendar_model extends CI_Model
{
	var $options;
	public function __construct(){
		parent::__construct();
		
		$this->options = array(
						'start_day' =>'monday',
						'show_next_prev'=> true,
						'show_other_days'=> true,
						'next_prev_url'=>base_url().'App/index'
					);

$this->options['template'] = '

    {table_open}<table border="0" cellpadding="4" cellspacing="0" class="calendar" >{/table_open}

    {heading_row_start}<tr>{/heading_row_start}

    {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
    {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
    {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

    {heading_row_end}</tr>{/heading_row_end}

    {week_row_start}<tr>{/week_row_start}
    {week_day_cell}<td>{week_day}</td>{/week_day_cell}
    {week_row_end}</tr>{/week_row_end}

    {cal_row_start}<tr class="days">{/cal_row_start}
    {cal_cell_start}<td class="day">{/cal_cell_start}

    {cal_cell_start_today}<td>{/cal_cell_start_today}
    {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

    {cal_cell_content}
    	<div class="day_num">{day}</div>
    	<div class="content">{content}</div>
    {/cal_cell_content}

    {cal_cell_content_today}
    	<div class="day_num highlight">{day}</div>
    	<div class="content">{content}</div>
    {/cal_cell_content_today}

    {cal_cell_no_content}
    	<div class="day_num highlight">{day}</div>
    {/cal_cell_no_content}
    {cal_cell_no_content_today}
    	<div class="day_num highlight">{day}</div>
    {/cal_cell_no_content_today}

    {cal_cell_blank}&nbsp;{/cal_cell_blank}

    {cal_cell_other}{day}{/cal_cel_other}

    {cal_cell_end}</td>{/cal_cell_end}
    {cal_cell_end_today}</td>{/cal_cell_end_today}
    {cal_cell_end_other}</td>{/cal_cell_end_other}
    {cal_row_end}</tr>{/cal_row_end}

    {table_close}</table>{/table_close}
';			
					
}

	function getCalendar_data($year,$month)
	{
		$qry = $this->db->select('startDate, title')
					->from('appointment')
					->like('startDate',"$year-$month", 'after')
					->get();
					
		$cal_data = array();
		foreach ($qry->result() as $row) {
			$cal_data[substr($row->startDate,8,2)] = $row->title;
		}

			
		//var_dump($cal_data);
				
		return $cal_data;
	}
	/**
	 * generateCal 
	 * @param  int    $year  [description]
	 * @param  int    $month [description]
	 * @return [type]        [description]
	 */
	public function generateCal($year, $month)
	{
		$this->load->library('calendar',$this->options);
		$cal_data = $this->getCalendar_data($year,$month);

		return  $this->calendar->generate($year,$month,$cal_data);
	
	}

	
}