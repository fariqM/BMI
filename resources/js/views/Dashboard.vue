<template>
	<div>
		<div class="row">
			<div class="col-md-12 grid-margin">
				<div class="card">
					<div class="card-body">
						<h3 class="card-title">Main Dashboard</h3>
						<p class="card-description">
							Read the
							<a
								href="https://dreamywaze--myukm.000webhostapp.com/"
								target="_blank"
							>
								User Guide</a
							>
							for more info
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<apexchart
							type="bar"
							height="350"
							:options="chartOptions"
							:series="series"
						></apexchart>
					</div>
				</div>
			</div>
		</div>

		<!-- <apexchart
			width="380"
			type="donut"
			:options="options"
			:series="series"
		></apexchart> -->
	</div>
</template>

<script>
export default {
	data() {
		return {
			series: [
				{
					name: "PRODUCT A",
					data: [44, 55, 41, 67, 22, 43],
				},
				{
					name: "PRODUCT B",
					data: [13, 23, 20, 8, 13, 27],
				},
				{
					name: "PRODUCT C",
					data: [11, 17, 15, 15, 21, 14],
				},
				{
					name: "PRODUCT D",
					data: [21, 7, 25, 13, 22, 8],
				},
			],
			chartOptions: {
				chart: {
					type: "bar",
					height: 350,
					stacked: true,
					toolbar: {
						show: true,
					},
					zoom: {
						enabled: true,
					},
				},
				responsive: [
					{
						breakpoint: 480,
						options: {
							legend: {
								position: "bottom",
								offsetX: -10,
								offsetY: 0,
							},
						},
					},
				],
				plotOptions: {
					bar: {
						borderRadius: 8,
						horizontal: false,
					},
				},
				xaxis: {
					type: "datetime",
					categories: [
						"01/01/2011 GMT",
						"01/02/2011 GMT",
						"01/03/2011 GMT",
						"01/04/2011 GMT",
						"01/05/2011 GMT",
						"01/06/2011 GMT",
					],
				},
				legend: {
					position: "right",
					offsetY: 40,
				},
				fill: {
					opacity: 1,
				},
			},
			
		};
	},
};
</script>

<style>
</style>