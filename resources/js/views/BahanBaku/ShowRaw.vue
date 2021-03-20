<template>
	<div>
		<nav class="page-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Gudang Bahan Baku</a></li>
				<li class="breadcrumb-item">
					<router-link :to="{ name: 'bb.index' }">Index</router-link>
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					{{ raws.series }}
				</li>
			</ol>
		</nav>

		<div class="row">
			<div class="col-md-12">
				<div class="card" id="section-to-print">
					<div class="card-body">
						<div class="container-fluid d-flex justify-content-between">
							<div class="col-lg-3 pl-0">
								<a href="#" class="noble-ui-logo d-block mt-3"
									>SIBMI <span>Web</span></a
								>
								<p class="mt-1 mb-1"><b>PT. Bina Megah Indowood</b></p>
								<p>
									Jl. Raya Putat Lor No.16, Gantang,<br />
									Boboh, Kec. Menganti,<br />Kabupaten Gresik, Jawa Timur 61174.
								</p>
								<h5 class="mt-5 mb-2 text-muted">Invoice to :</h5>
								<p>
									{{ raws.supplier }},<br />
									{{ raws.supplier_address }},<br />
									Indonesia, Southeast Asia.
								</p>
							</div>
							<div class="col-lg-3 pr-0">
								<h4
									class="font-weight-medium text-uppercase text-right mt-4 mb-2"
								>
									invoice
								</h4>
								<h6 class="text-right mb-5 pb-4"># INV-{{ raws.invoice }}</h6>
								<br /><br />
								<h6 class="mb-0 mt-3 text-right font-weight-normal mb-2">
									<span class="text-muted">Invoice Date :</span>
									{{ raws.invoice_date }}
								</h6>
								<h6 class="text-right font-weight-normal">
									<span class="text-muted">Due Date :</span> Secret
								</h6>
							</div>
						</div>
						<div
							class="container-fluid mt-5 d-flex justify-content-center w-100"
						>
							<div class="table-responsive w-100">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>#</th>
											<th>Series</th>
											<th>Description</th>
											<th class="text-right">Type</th>
											<th class="text-right">Quantity</th>
											<th class="text-right">Height</th>
											<th class="text-right">Length</th>
											<th class="text-right">width</th>
											<th class="text-right">Volume</th>
										</tr>
									</thead>
									<tbody>
										<tr class="text-right">
											<td class="text-left">1</td>
											<td class="text-left">{{ raws.series }}</td>
											<td class="text-left">Log Wood</td>
											<td>{{ raws.type }}</td>
											<td>{{ raws.amount }}</td>
											<td>{{ raws.height }}</td>
											<td>{{ raws.length }}</td>
											<td>{{ raws.width }}</td>
											<td>{{ raws.size }}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div id="not-printed" class="container-fluid w-100">
							<a
								onclick="window.print();return false;" 
								class="btn btn-outline-primary float-right mt-4 del-btn"
							>
								<i data-feather="printer" class="mr-2 icon-md"></i>Print
							</a>
							<router-link
							style="margin-right: 5px"
								:to="{name: 'bb.index'}"
								class="btn btn-secondary float-right mt-4 del-btn"
							>
								Back
							</router-link>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			raws: [],
			column: [
				{ key: "series", label: "Series", sortable: true },
				{ key: "series", label: "Series", sortable: true },
			],
		};
	},

	mounted() {
		this.getraws();
	},

	methods: {
		print() {
			// Pass the element id here
			this.$htmlToPaper("section-to-print");
		},
		async getraws() {
			let response = await axios.get(
				`/api/gudang-bahanbaku/index/${this.$route.params.RawId}`
			);
			this.raws = response.data.data;
		},
	},
};
</script>

<style>
</style>