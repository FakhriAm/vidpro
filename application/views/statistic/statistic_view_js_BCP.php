<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<script>
	$(function() {
		statLatestVideoMandatory();
		statLatestVideoMandatoryByCategory();
		statLatestVideoMandatoryByUploader();
		statLatestVideoMandatoryByCategoryCompany(<?= $company[0]->id ?>);
		statHistoryVideoMandatoryYearly();
		statHistoryVideoMandatoryMonthly(<?= date('Y', time()) ?>);
		statHistoryVideoMandatoryByCategoryYearly();
		statHistoryVideoMandatoryByCategoryMonthly(<?= date('Y', time()) ?>);
		latestRequestByYearly(<?= date('Y', time()) ?>);
		statRequestVUploadByCompanyYearly(<?= date('Y', time()) ?>);

		$("[name='companyCategory']").on('change', (e) => {
			statLatestVideoMandatoryByCategoryCompany(e.target.value);
		});
		$("[name='vmMonthly']").on('change', (e) => {
			statHistoryVideoMandatoryMonthly(e.target.value);
		});
		$("[name='vmLatestRequest']").on('change', (e) => {
			latestRequestByYearly(e.target.value);
		});
		$('.btn[data-filter]').on('click', function() {
			$('.btn[data-filter]').removeClass('active');
			$(this).addClass('active');

			var id = $(this).attr('data-filter');
			$(".filter-item-" + id).show();
			$(".filter-item").not(".filter-item-" + id).hide();
		});
		$("a.all-item").on('click', () => {
			$(".filter-item").show();
		});
		
		
	});

	function statLatestVideoMandatory() {
		am4core.useTheme(am4themes_animated);

		var chart = am4core.create("stat-video-mandatory", am4charts.PieChart);
		chart.dataSource.url = "<?= base_url('statistic/statLatestVideoMandatory') ?>";
		chart.dataSource.parser = new am4core.JSONParser();
		chart.dataSource.parser.options.emptyAs = 0;

		chart.innerRadius = am4core.percent(50);

		var series = chart.series.push(new am4charts.PieSeries());
		series.dataFields.value = "value";
		series.dataFields.category = "company";

		series.slices.template.cornerRadius = 10;
		series.slices.template.innerCornerRadius = 7;
		series.alignLabels = false;
		series.labels.template.padding(0, 0, 0, 0);

		series.labels.template.bent = false;
		series.labels.template.radius = 4;
		series.labels.template.fontSize = 12;
		series.labels.template.text = "[bold]{category}:[/]\n{value} ({value.percent.formatNumber('#.0')}%)";

		series.ticks.template.disabled = true;

		// this creates initial animation
		series.hiddenState.properties.opacity = 1;
		series.hiddenState.properties.endAngle = -90;
		series.hiddenState.properties.startAngle = -90;
	}

	function statLatestVideoMandatoryByCategory() {
		am4core.useTheme(am4themes_animated);

		var chart = am4core.create("stat-video-mandatory-by-category", am4charts.PieChart);
		chart.dataSource.url = "<?= base_url('statistic/statLatestVideoCategory') ?>";
		chart.dataSource.parser = new am4core.JSONParser();
		chart.dataSource.parser.options.emptyAs = 0;

		chart.innerRadius = am4core.percent(50);

		var series = chart.series.push(new am4charts.PieSeries());
		series.dataFields.value = "value";
		series.dataFields.category = "company";

		series.slices.template.cornerRadius = 10;
		series.slices.template.innerCornerRadius = 7;
		series.alignLabels = false;
		series.labels.template.padding(0, 0, 0, 0);

		series.labels.template.bent = false;
		series.labels.template.radius = 4;
		series.labels.template.fontSize = 12;
		series.labels.template.text = "[bold]{category}:[/]\n{value} ({value.percent.formatNumber('#.0')}%)";

		series.ticks.template.disabled = true;

		// this creates initial animation
		series.hiddenState.properties.opacity = 1;
		series.hiddenState.properties.endAngle = -90;
		series.hiddenState.properties.startAngle = -90;
	}
	function statLatestVideoMandatoryByCategoryCompany(idCompany) {
		am4core.useTheme(am4themes_animated);

		var chart = am4core.create("stat-video-mandatory-by-category-and-company", am4charts.PieChart);
		chart.dataSource.url = "<?= base_url('statistic/statLatestVideoCategoryCompany') ?>" + idCompany;
		chart.dataSource.parser = new am4core.JSONParser();
		chart.dataSource.parser.options.emptyAs = 0;

		chart.innerRadius = am4core.percent(50);

		var series = chart.series.push(new am4charts.PieSeries());
		series.dataFields.value = "value";
		series.dataFields.category = "company";

		series.slices.template.cornerRadius = 10;
		series.slices.template.innerCornerRadius = 7;
		series.alignLabels = false;
		series.labels.template.padding(0, 0, 0, 0);

		series.labels.template.bent = false;
		series.labels.template.radius = 4;
		series.labels.template.fontSize = 12;
		series.labels.template.text = "[bold]{category}:[/]\n{value} ({value.percent.formatNumber('#.0')}%)";

		series.ticks.template.disabled = true;

		// this creates initial animation
		series.hiddenState.properties.opacity = 1;
		series.hiddenState.properties.endAngle = -90;
		series.hiddenState.properties.startAngle = -90;
	}

	function statLatestVideoMandatoryByUploader() {
		am4core.useTheme(am4themes_animated);

		var chart = am4core.create("stat-video-mandatory-by-uploader", am4charts.PieChart);
		chart.dataSource.url = "<?= base_url('statistic/statLatestVideoUploader') ?>";
		chart.dataSource.parser = new am4core.JSONParser();
		chart.dataSource.parser.options.emptyAs = 0;

		chart.innerRadius = am4core.percent(50);

		var series = chart.series.push(new am4charts.PieSeries());
		series.dataFields.value = "value";
		series.dataFields.category = "category";
		series.dataFields.company = "company";

		series.slices.template.cornerRadius = 10;
		series.slices.template.innerCornerRadius = 7;
		series.alignLabels = false;
		series.labels.template.padding(0, 0, 0, 0);

		series.labels.template.bent = false;
		series.labels.template.radius = 4;
		series.labels.template.fontSize = 9;
		series.labels.template.text = "{category} [bold]({company})[/]:\n {value} ({value.percent.formatNumber('#.0')}%)";

		series.ticks.template.disabled = true;

		// this creates initial animation
		series.hiddenState.properties.opacity = 1;
		series.hiddenState.properties.endAngle = -90;
		series.hiddenState.properties.startAngle = -90;
	}

	function statHistoryVideoMandatoryYearly() {
		am4core.useTheme(am4themes_animated);

		var chart = am4core.create("stat-history-video-mandatory-yearly", am4charts.XYChart);
		chart.dataSource.url = "<?= base_url('statistic/statHistoryVideoMandatoryYearly') ?>";
		chart.dataSource.parser = new am4core.JSONParser();
		chart.dataSource.parser.options.emptyAs = 0;


		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "year";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;
		categoryAxis.dateFormatter = new am4core.DateFormatter();
		categoryAxis.dateFormatter.dateFormat = "Y";

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

		// Create series
		function createSeries(field, name) {

			// Set up series
			var series = chart.series.push(new am4charts.ColumnSeries());
			series.name = name;
			series.dataFields.valueY = field;
			series.dataFields.categoryX = "year";
			series.sequencedInterpolation = true;

			// Make it stacked
			series.stacked = true;

			// Configure columns
			series.columns.template.width = am4core.percent(60);
			series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";

			// Add label
			var labelBullet = series.bullets.push(new am4charts.LabelBullet());
			labelBullet.label.text = "{valueY}";
			labelBullet.locationY = 0.5;
			labelBullet.label.hideOversized = true;

			// this creates initial animation
			series.hiddenState.properties.opacity = 1;
			series.hiddenState.properties.endAngle = -90;
			series.hiddenState.properties.startAngle = -90;

			return series;
		}

		<?php foreach ($company as $row) : ?>
			createSeries(<?= $row->id; ?>, "<?= $row->content; ?>");
		<?php endforeach ?>
	}

	function statHistoryVideoMandatoryMonthly(year) {
		am4core.useTheme(am4themes_animated);

		var chart = am4core.create("stat-history-video-mandatory-monthly", am4charts.XYChart);
		chart.dataSource.url = "<?= base_url('statistic/statHistoryVideoMandatoryMonthly/') ?>" + year;
		chart.dataSource.parser = new am4core.JSONParser();
		chart.dataSource.parser.options.emptyAs = 0;


		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "month";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 0;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

		// Create series
		function createSeries(field, name) {

			// Set up series
			var series = chart.series.push(new am4charts.ColumnSeries());
			series.name = name;
			series.dataFields.valueY = field;
			series.dataFields.categoryX = "month";
			series.sequencedInterpolation = true;

			// Make it stacked
			series.stacked = true;

			// Configure columns
			series.columns.template.width = am4core.percent(60);
			series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";

			// Add label
			var labelBullet = series.bullets.push(new am4charts.LabelBullet());
			labelBullet.label.text = "{valueY}";
			labelBullet.locationY = 0.5;
			labelBullet.label.hideOversized = true;

			// this creates initial animation
			series.hiddenState.properties.opacity = 1;
			series.hiddenState.properties.endAngle = -90;
			series.hiddenState.properties.startAngle = -90;

			return series;
		}

		<?php foreach ($company as $row) : ?>
			createSeries(<?= $row->id; ?>, "<?= $row->content; ?>");
		<?php endforeach ?>
	}

	function statHistoryVideoMandatoryByCategoryYearly() {
		am4core.useTheme(am4themes_animated);

		var chart = am4core.create("stat-history-video-mandatory-by-category-yearly", am4charts.XYChart);
		chart.dataSource.url = "<?= base_url('statistic/statHistoryVideoMandatoryCategoryYearly') ?>";
		chart.dataSource.parser = new am4core.JSONParser();
		chart.dataSource.parser.options.emptyAs = 0;


		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "year";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;
		categoryAxis.dateFormatter = new am4core.DateFormatter();
		categoryAxis.dateFormatter.dateFormat = "Y";

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

		// Create series
		function createSeries(field, name) {

			// Set up series
			var series = chart.series.push(new am4charts.ColumnSeries());
			series.name = name;
			series.dataFields.valueY = field;
			series.dataFields.categoryX = "year";
			series.sequencedInterpolation = true;

			// Make it stacked
			series.stacked = true;

			// Configure columns
			series.columns.template.width = am4core.percent(60);
			series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";

			// Add label
			var labelBullet = series.bullets.push(new am4charts.LabelBullet());
			labelBullet.label.text = "{valueY}";
			labelBullet.locationY = 0.5;
			labelBullet.label.hideOversized = true;

			// this creates initial animation
			series.hiddenState.properties.opacity = 1;
			series.hiddenState.properties.endAngle = -90;
			series.hiddenState.properties.startAngle = -90;

			return series;
		}

		<?php foreach ($category as $row) : ?>
			createSeries("<?= $row->content; ?>", "<?= $row->content; ?>");
		<?php endforeach ?>
	}

	function statHistoryVideoMandatoryByCategoryMonthly(year) {
		am4core.useTheme(am4themes_animated);

		var chart = am4core.create("stat-history-video-mandatory-by-category-monthly", am4charts.XYChart);
		chart.dataSource.url = "<?= base_url('statistic/statHistoryVideoMandatoryCategoryMonthly/') ?>" + year;
		chart.dataSource.parser = new am4core.JSONParser();
		chart.dataSource.parser.options.emptyAs = 0;


		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "month";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;
		categoryAxis.dateFormatter = new am4core.DateFormatter();
		categoryAxis.dateFormatter.dateFormat = "Y";

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

		// Create series
		function createSeries(field, name) {

			// Set up series
			var series = chart.series.push(new am4charts.ColumnSeries());
			series.name = name;
			series.dataFields.valueY = field;
			series.dataFields.categoryX = "month";
			series.sequencedInterpolation = true;

			// Make it stacked
			series.stacked = true;

			// Configure columns
			series.columns.template.width = am4core.percent(60);
			series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";

			// Add label
			var labelBullet = series.bullets.push(new am4charts.LabelBullet());
			labelBullet.label.text = "{valueY}";
			labelBullet.locationY = 0.5;
			labelBullet.label.hideOversized = true;

			// this creates initial animation
			series.hiddenState.properties.opacity = 1;
			series.hiddenState.properties.endAngle = -90;
			series.hiddenState.properties.startAngle = -90;

			return series;
		}

		<?php foreach ($category as $row) : ?>
			createSeries("<?= $row->content; ?>", "<?= $row->content; ?>");
		<?php endforeach ?>
	}

	function latestRequestByYearly(year) {
		$.ajax({
			url: "<?= base_url(index_page() . '/latest-request/') ?>" + year,
			success: function(resp) {
				var vHTML = "";
				if (resp['data'].length > 0) {
					resp['data'].forEach((val, i) => {
						let vDateUpload = val['uploaded_date'] !== null ? val['uploaded_date'] : '-';
						let vGapTime = val['gapTime'] !== null ? val['gapTime'] : '-';
						vHTML += "<tr>"
						vHTML += "<td>" + (i + 1) + "<\/td>";
						vHTML += "<td>" + val['desc_from'] + "<\/td>";
						vHTML += "<td>" + val['request_program'] + "<\/td>";
						vHTML += "<td>" + val['desc_send_to'] + "<\/td>";
						vHTML += "<td>" + val['request_date'] + "<\/td>";
						vHTML += "<td>" + vDateUpload + "<\/td>";
						vHTML += "<td>" + vGapTime + "<\/td>";
						vHTML += "<\/tr>"
					});
				} else {
					vHTML += "<tr><td class='text-center text-bold' colspan='7'>Data is Empty<\/td><\/tr>"
				}
				$("#latest-request tbody").html(vHTML);

				if (resp['statUploadCompany'].length > 0) {
					resp['statUploadCompany'].forEach((val, i) => {
						$(".upload-ibn-" + val['id']).html(val['total']);
					});
				}

				if (resp['statRequestCompany'].length > 0) {
					resp['statRequestCompany'].forEach((val, i) => {
						$(".request-ibn-" + val['id']).html(val['total']);
					});
				}

				if (resp['statGaptimeCompany'].length > 0) {
					resp['statGaptimeCompany'].forEach((val, i) => {
						$(".gaptime-ibn-" + val['id']).html(val['total'] + ' days');
					});
				}

				var hLatestRequest = document.getElementById('id-latest-request');
				$("#id-company-request").height(hLatestRequest.offsetHeight);
			}
		})
	}

	function statRequestVUploadByCompanyYearly(year) {
		am4core.useTheme(am4themes_animated);

		var chart = am4core.create("stat-request-v-company-yearly", am4charts.XYChart);
		chart.dataSource.url = "<?= base_url(index_page() . '/stat-request-v-company-yearly/') ?>" + year;
		chart.dataSource.parser = new am4core.JSONParser();
		chart.dataSource.parser.options.emptyAs = 0;


		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "company";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 30;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

		// Create series
		function createSeries(field, name) {

			// Set up series
			var series = chart.series.push(new am4charts.ColumnSeries());
			series.name = name;
			series.dataFields.valueY = field;
			series.dataFields.categoryX = "company";
			series.sequencedInterpolation = true;

			// Make it stacked
			series.stacked = true;

			// Configure columns
			series.columns.template.width = am4core.percent(60);
			series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";

			// Add label
			var labelBullet = series.bullets.push(new am4charts.LabelBullet());
			labelBullet.label.text = "{valueY}";
			labelBullet.locationY = 0.5;
			labelBullet.label.hideOversized = true;

			// this creates initial animation
			series.hiddenState.properties.opacity = 1;
			series.hiddenState.properties.endAngle = -90;
			series.hiddenState.properties.startAngle = -90;

			return series;
		}

		createSeries("upload", "upload");
		createSeries("request", "request");
	}

</script>