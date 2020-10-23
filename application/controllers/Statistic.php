<?php defined('BASEPATH') or exit('No direct script access allowed');
class Statistic extends MY_Controller
{
	protected $aMonth = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Des');
	protected $thisMonth;
	
    function __construct()
    {
        parent::__construct();
        $this->load->model('data_model', 'data_model');
		$this->load->model('video_model', 'vid');
    }

    public function index()
    {
		$this->thisMonth = date('m', time());
		$queryCompany = $this->data_model->SelectData(
			array(
				'db' => 'default',
				'select' => 'id, content_links, content',
				'table' => 'video_source',
				'order' => array(
					array(
						'kolom' => 'id',
						'sort' => 'ASC'
					)
				),
			)
		);
		
		$queryCategory = $this->data_model->SelectData(
			array(
				'db' => 'default',
				'select' => 'id, content',
				'table' => 'video_category',
				'order' => array(
					array(
						'kolom' => 'content',
						'sort' => 'DESC'
					)
				),
			)
		);
        $this->load->view('part/default/wrapper', array('content_js' => 'statistic/statistic_view_js','company' => $queryCompany->result(), 'category' => $queryCategory->result(),'','content' => 'statistic/statistic_view', 'video_source' => $this->loadVideoSource(), 'menu' => $this->getAllUserMenu()));
	}
	public function loadVideoSource()
	{
		return $this->vid->get_video_source();
	}


	function statLatestVideoMandatory()
	{
		$queryVideoMandatory = $this->data_model->SelectData(
			array(
				'db' => 'default',
				'select' => '`video_source`.`content_links`, `video_source`.content as company, COUNT(*) as value',
				'table' => 'video_meta',
				'join' => array(
					array(
						'table' => 'users',
						'condition' => 'users.id = video_meta.uploader',
						'type' => 'LEFT',
					),
					array(
						'table' => 'video_source',
						'condition' => 'video_source.id = users.company',
						'type' => 'INNER',
					)
				),
				'where' => array('video_meta.active' => 1),
				'group' => '`video_source`.`id`'
			)
		);

		header('Content-Type: application/json');
		echo json_encode($queryVideoMandatory->result());
	}

	function statLatestVideoCategory()
	{
		$queryVideoMandatory = $this->data_model->SelectData(
			array(
				'db' => 'default',
				'select' => 'video_category.content as category, count(*) as value',
				'table' => 'video_meta',
				'join' => array(
					array(
						'table' => 'users',
						'condition' => 'users.id = video_meta.uploader',
						'type' => 'LEFT',
					),
					array(
						'table' => 'video_source',
						'condition' => 'video_source.id = users.company',
						'type' => 'INNER',
					),
					array(
						'table' => 'video_category',
						'condition' => 'video_category.id = video_meta.id_video_category',
						'type' => 'INNER',
					)
				),
				'where' => array('video_meta.active' => 1),
				'group' => 'video_meta.id_video_category'
			)
		);

		header('Content-Type: application/json');
		echo json_encode($queryVideoMandatory->result());
	}

	function statLatestVideoCategoryCompany()
	{
		$uid_company = $this->uri->segment(2);
		$queryVideoMandatory = $this->data_model->SelectData(
			array(
				'db' => 'default',
				'select' => 'video_category.content as category, count(*) as value',
				'table' => 'video_meta',
				'join' => array(
					array(
						'table' => 'users',
						'condition' => 'users.id = video_meta.uploader',
						'type' => 'LEFT',
					),
					array(
						'table' => 'video_source',
						'condition' => 'video_source.id = users.company',
						'type' => 'INNER',
					),
					array(
						'table' => 'video_category',
						'condition' => 'video_category.id = video_meta.id_video_category',
						'type' => 'INNER',
					)
				),
				'where' => array('video_meta.active' => 1, 'video_source.id' => $uid_company),
				'group' => 'video_meta.id_video_category'
			)
		);

		header('Content-Type: application/json');
		echo json_encode($queryVideoMandatory->result());
	}

	function statLatestVideoUploader()
	{
		$queryVideoMandatory = $this->data_model->SelectData(
			array(
				'db' => 'default',
				'select' => 'video_meta.uploader, users.first_name as category, video_source.content as company, count(*) as value',
				'table' => 'video_meta',
				'join' => array(
					array(
						'table' => 'users',
						'condition' => 'users.id = video_meta.uploader',
						'type' => 'LEFT',
					),
					array(
						'table' => 'video_source',
						'condition' => 'video_source.id = users.company',
						'type' => 'INNER',
					),
					array(
						'table' => 'video_category',
						'condition' => 'video_category.id = video_meta.id_video_category',
						'type' => 'INNER',
					)
				),
				'where' => array('video_meta.active' => 1),
				'group' => 'video_meta.uploader'
			)
		);

		header('Content-Type: application/json');
		echo json_encode($queryVideoMandatory->result());
	}

	function statHistoryVideoMandatoryYearly()
	{
		$queryVideoMandatory = $this->data_model->SelectData(
			array(
				'db' => 'default',
				'select' => '`video_source`.`id`, `video_source`.content as company, year(video_meta.uploaded_date) AS `year`',
				'table' => 'video_meta',
				'join' => array(
					array(
						'table' => 'users',
						'condition' => 'users.id = video_meta.uploader',
						'type' => 'LEFT',
					),
					array(
						'table' => 'video_source',
						'condition' => 'video_source.id = users.company',
						'type' => 'INNER',
					),
					array(
						'table' => 'video_category',
						'condition' => 'video_category.id = video_meta.id_video_category',
						'type' => 'INNER',
					)
				)
			)
		);

		$cData = array();
		$pCompany = array();
		if ($queryVideoMandatory->num_rows() > 0) {
			foreach ($queryVideoMandatory->result() as $row) {
				$cData[$row->year][$row->id][] = 1;
				$pCompany[$row->id] = $row->id;
			}
		}

		$twoYearAgo = date('Y', time()) - 4;
		$thisYear = date('Y', time());

		$aCount = array();
		for ($i = $twoYearAgo; $i <= $thisYear; $i++) {
			foreach ($pCompany as $k => $v) {
				$aCount[$i][$v] = !empty($cData[$i][$v]) ? count($cData[$i][$v]) : 0;
			}
		}

		for ($i = $twoYearAgo; $i <= $thisYear; $i++) {
			$fData[] = array_merge(array('year' => $i), $aCount[$i]);
		}

		header('Content-Type: application/json');
		echo json_encode($fData);
	}

	function statHistoryVideoMandatoryMonthly()
	{
		$uYear = $this->uri->segment(2);
		$queryVideoMandatory = $this->data_model->SelectData(
			array(
				'db' => 'default',
				'select' => '`video_source`.`id`, `video_source`.content as company, month(video_meta.uploaded_date) AS `month`',
				'table' => 'video_meta',
				'join' => array(
					array(
						'table' => 'users',
						'condition' => 'users.id = video_meta.uploader',
						'type' => 'LEFT',
					),
					array(
						'table' => 'video_source',
						'condition' => 'video_source.id = users.company',
						'type' => 'INNER',
					),
					array(
						'table' => 'video_category',
						'condition' => 'video_category.id = video_meta.id_video_category',
						'type' => 'INNER',
					)
				),
				'where' => array(
					'year(video_meta.uploaded_date)' => $uYear
				)
			)
		);

		$cData = array();
		$pCompany = array();
		if ($queryVideoMandatory->num_rows() > 0) {
			foreach ($queryVideoMandatory->result() as $row) {
				$cData[$row->month][$row->id][] = 1;
				$pCompany[$row->id] = $row->id;
			}
		}

		$aCount = array();
		for ($i = 1; $i <= 12; $i++) {
			foreach ($pCompany as $k => $v) {
				$aCount[$i][$v] = !empty($cData[$i][$v]) ? count($cData[$i][$v]) : 0;
			}
		}

		$fData = array();
		for ($i = 1; $i <= 12; $i++) {
			if (!empty($aCount[$i])) {
				$fData[] = array_merge(array('month' => $this->aMonth[$i - 1]), $aCount[$i]);
			}
		}

		header('Content-Type: application/json');
		echo json_encode($fData);
	}

	function statHistoryVideoMandatoryCategoryYearly()
	{
		$queryVideoMandatory = $this->data_model->SelectData(
			array(
				'db' => 'default',
				'select' => 'video_category.content as category, year(video_meta.uploaded_date) AS `year`',
				'table' => 'video_meta',
				'join' => array(
					array(
						'table' => 'users',
						'condition' => 'users.id = video_meta.uploader',
						'type' => 'INNER',
					),
					array(
						'table' => 'video_source',
						'condition' => 'video_source.id = users.company',
						'type' => 'INNER',
					),
					array(
						'table' => 'video_category',
						'condition' => 'video_category.id = video_meta.id_video_category',
						'type' => 'INNER',
					)
				)
			)
		);

		$cData = array();
		$pCategory = array();
		if ($queryVideoMandatory->num_rows() > 0) {
			foreach ($queryVideoMandatory->result() as $row) {
				$cData[$row->year][$row->category][] = 1;
				$pCategory[$row->category] = $row->category;
			}
		}

		$twoYearAgo = date('Y', time()) - 4;
		$thisYear = date('Y', time());

		$aCount = array();
		for ($i = $twoYearAgo; $i <= $thisYear; $i++) {
			foreach ($pCategory as $k => $v) {
				$aCount[$i][$v] = !empty($cData[$i][$v]) ? count($cData[$i][$v]) : 0;
			}
		}

		for ($i = $twoYearAgo; $i <= $thisYear; $i++) {
			$fData[] = array_merge(array('year' => $i), $aCount[$i]);
		}

		header('Content-Type: application/json');
		echo json_encode($fData);
	}

	function statHistoryVideoMandatoryCategoryMonthly()
	{
		$uYear = $this->uri->segment(2);
		$queryVideoMandatory = $this->data_model->SelectData(
			array(
				'db' => 'default',
				'select' => 'video_category.content as category, month(video_meta.uploaded_date) AS `month`',
				'table' => 'video_meta',
				'join' => array(
					array(
						'table' => 'users',
						'condition' => 'users.id = video_meta.uploader',
						'type' => 'INNER',
					),
					array(
						'table' => 'video_source',
						'condition' => 'video_source.id = users.company',
						'type' => 'INNER',
					),
					array(
						'table' => 'video_category',
						'condition' => 'video_category.id = video_meta.id_video_category',
						'type' => 'INNER',
					)
				),
				'where' => array(
					'year(video_meta.uploaded_date)' => $uYear
				)
			)
		);

		$cData = array();
		$pCategory = array();
		if ($queryVideoMandatory->num_rows() > 0) {
			foreach ($queryVideoMandatory->result() as $row) {
				$cData[$row->month][$row->category][] = 1;
				$pCategory[$row->category] = $row->category;
			}
		}

		$aCount = array();
		for ($i = 1; $i <= 12; $i++) {
			foreach ($pCategory as $k => $v) {
				$aCount[$i][$v] = !empty($cData[$i][$v]) ? count($cData[$i][$v]) : 0;
			}
		}

		for ($i = 1; $i <= 12; $i++) {
			$fData[] = array_merge(array('month' => $this->aMonth[$i - 1]), $aCount[$i]);
		}

		header('Content-Type: application/json');
		echo json_encode($fData);
	}

	function latestRequestByYearly()
	{
		$uYear = $this->uri->segment(2);
		$queryLatestRequest = $this->data_model->SelectData(
			array(
				'db' => 'default',
				'select' => 'desc_from, desc_send_to, request_program, request_date, uploaded_date, DATEDIFF(request_date, uploaded_date) as gapTime',
				'table' => 'request_transaction',
				'where' => array(
					'year(request_transaction.request_date)' => $uYear
				),
				'paging' => array(
					'per_page' => 10,
					'offset' => 0
				),
				'order' => array(
					array(
						'kolom' => 'request_date',
						'sort' => 'DESC'
					)
				),
			)
		);

		$queryLatestRequestAll = $this->data_model->SelectData(
			array(
				'db' => 'default',
				'select' => 'from, send_to, uploaded_date, DATEDIFF(request_date, uploaded_date) as gapTime',
				'table' => 'request_transaction',
				'where' => array(
					'year(request_transaction.request_date)' => $uYear
				)
			)
		);

		$queryCompany = $this->data_model->SelectData(
			array(
				'db' => 'default',
				'select' => 'id, content_links, content',
				'table' => 'video_source',
				'order' => array(
					array(
						'kolom' => 'content',
						'sort' => 'ASC'
					)
				),
			)
		);

		$aCompany = array();
		if ($queryLatestRequestAll->num_rows() > 0) {
			foreach ($queryLatestRequestAll->result() as $row) {
				if (!empty($row->uploaded_date)) {
					$aCompany[$row->send_to]['upload'][] = 1;
				}
				if (!empty($row->gapTime)) {
					$aCompany[$row->send_to]['gapTime'][] = $row->gapTime;
				}
				$aCompany[$row->from]['request'][] = 1;
			}
		}

		$fUploadCompany = array();
		$fRequestCompany = array();
		$fGaptimeCompany = array();
		if ($queryCompany->num_rows() > 0) {
			foreach ($queryCompany->result() as $row) {
				$fUploadCompany[] = (!empty($aCompany[$row->id]['upload'])) ?  array('company' => $row->content, 'id' => $row->id, 'total' => count($aCompany[$row->id]['upload'])) : array('company' => $row->content, 'id' => $row->id, 'total' => 0);
				$fRequestCompany[] = (!empty($aCompany[$row->id]['request'])) ?  array('company' => $row->content, 'id' => $row->id, 'total' => count($aCompany[$row->id]['request'])) : array('company' => $row->content, 'id' => $row->id, 'total' => 0);
				$fGaptimeCompany[] = (!empty($aCompany[$row->id]['gapTime'])) ?  array('company' => $row->content, 'id' => $row->id, 'total' => round(array_sum($aCompany[$row->id]['gapTime']) / count($aCompany[$row->id]['gapTime']), 2)) : array('company' => $row->content, 'id' => $row->id, 'total' => 0);
			}
		}

		header('Content-Type: application/json');
		echo json_encode(
			array(
				'data' => $queryLatestRequest->result(),
				'statUploadCompany' => $fUploadCompany,
				'statRequestCompany' => $fRequestCompany,
				'statGaptimeCompany' => $fGaptimeCompany
			)
		);
	}

	function latestRequestByCompanyYearly()
	{
		$uYear = $this->uri->segment(2);
		$queryLatestRequestAll = $this->data_model->SelectData(
			array(
				'db' => 'default',
				'select' => 'from, send_to, uploaded_date, DATEDIFF(request_date, uploaded_date) as gapTime',
				'table' => 'request_transaction',
				'where' => array(
					'year(request_transaction.request_date)' => $uYear
				)
			)
		);

		$queryCompany = $this->data_model->SelectData(
			array(
				'db' => 'default',
				'select' => 'id, content_links, content',
				'table' => 'video_source',
				'order' => array(
					array(
						'kolom' => 'content',
						'sort' => 'ASC'
					)
				),
			)
		);
		
		$aCompany = array();
		if ($queryLatestRequestAll->num_rows() > 0) {
			foreach ($queryLatestRequestAll->result() as $row) {
				if (!empty($row->uploaded_date)) {
					$aCompany[$row->send_to]['upload'][] = 1;
				}
				$aCompany[$row->from]['request'][] = 1;
			}
		}

		$fData = array();
		if ($queryCompany->num_rows() > 0) {
			foreach ($queryCompany->result() as $row) {
				$upload = (!empty($aCompany[$row->id]['upload'])) ? count($aCompany[$row->id]['upload']) : 0;
				$request = (!empty($aCompany[$row->id]['request'])) ? count($aCompany[$row->id]['request']) : 0;

				$fData[] = array('company' => $row->content, 'upload' => $upload, 'request' => $request);
			}
		}

		header('Content-Type: application/json');
		echo json_encode($fData);
	}
}
