<?php 
class commentsView
{
	public $data;
	public $string;

	public function index(){
		$out = '';
		if(count($this->data)) : 
			foreach ($this->data as $val) {
				$read = ($val['read']==0) ? 'style="background-color:#f2f2f2"' : '';
				$out .= sprintf("<tr %s>
						<td>%d</td>
						<td>%s</td>
						<td>%s</td>
						<td>%s</td>
						<td>%s</td>
						<td>
							<a href=\"javascript:void(0)\" onclick=\"searchComments('%s')\"><i class=\"material-icons tooltipped\" data-position=\"bottom\" data-delay=\"50\" data-tooltip=\"სრულად ნახვა\">pageview</i></a>

							<a href=\"javascript:void(0)\" onclick=\"askRemoveComments('%s')\"><i class=\"material-icons tooltipped\" data-position=\"bottom\" data-delay=\"50\" data-tooltip=\"წაშლა\">delete</i></a>
						</td>
					</tr>",
					$read, 
					$val['id'],
					date("d/m/Y g:i:s", $val['date']), 
					$val['firstname'],
					$val['organization'],
					$val['email'],
					$val['id'], 
					$val['id']
				);
			}
		endif;
		return $out;
	}
}