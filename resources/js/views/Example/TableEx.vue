<template>
	<div>
		<nav class="page-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Gudang</a></li>
				<li class="breadcrumb-item active" aria-current="page">index</li>
			</ol>
		</nav>

		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Data bahan baku</h6>
						<p class="card-description">
							Read the
							<a href="https://datatables.net/" target="_blank">
								Caption blbababla </a
							>Keterangan blablabla
						</p>

                        <!-- FORM CONTROLL TABLE -->
						<div class="grid-container">
							<div class="grid-item-container grid-item-1">
								<div class="grid-subitem-1">
									<input
										placeholder="Search"
										class="costum-input"
										v-model="filter"
									/>
								</div>
								<div class="grid-subitem-2">
									<label class="costum-label-filter">Filter Kolom :</label>

									<input
										class="costum-checkbox"
										v-model="filterOn"
										value="size"
										id="kolomID"
										type="checkbox"
									/>
									<label class="costum-checkbox" for="kolomID">Size</label>

									<input
										class="costum-checkbox"
										v-model="filterOn"
										value="reference"
										id="kolomRef"
										type="checkbox"
									/>
									<label class="costum-checkbox" for="kolomRef">Reference</label>
								</div>
							</div>
							<div class="grid-item-container-2 grid-item-2">
								<div class="justify-content-between">
									<b-button @click="toggleBusy" variant="success">
										<b-icon icon="arrow-clockwise" aria-hidden="true"></b-icon>
										segarkan
									</b-button>
								
								</div>
								<div>
									<b-button
										style="justify-content: end; justify-content: end"
										@click="$router.push({ name: 'bb.form' })"
										variant="primary"
									>
										<b-icon icon="plus-square" aria-hidden="true"></b-icon>
										Tambahkan
									</b-button>
								</div>
							</div>
						</div>


                        <!-- TABEL -->
						<div class="table-responsive">
							<b-table
								head-variant="light"
								hover
								show-empty
								responsive="sm"
								:busy="isBusy"
								:filter="filter"
								@filtered="onFiltered"
								:filter-included-fields="filterOn"
								:items="dataTabel"
								:fields="kolom"
								:sort-by.sync="sortBy"
								:sort-desc.sync="sortDesc"
								><template #table-busy>
									<div class="text-center text-danger my-1">
										<svg
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink"
											style="
												margin: auto;
												background: none;
												display: block;
												shape-rendering: auto;
											"
											width="100px"
											height="100px"
											viewBox="0 0 100 100"
											preserveAspectRatio="xMidYMid"
										>
											<path
												d="M10 50A40 40 0 0 0 90 50A40 42 0 0 1 10 50"
												fill="#93dbe9"
												stroke="none"
											>
												<animateTransform
													attributeName="transform"
													type="rotate"
													dur="1s"
													repeatCount="indefinite"
													keyTimes="0;1"
													values="0 50 51;360 50 51"
												></animateTransform>
											</path>
										</svg>
									</div>
								</template>
								<template #cell(action)="data">
									<div class="justify-content-between">
										<router-link
											:to="{name: 'home'}"
											class="badge badge-info"
											><b-icon
												icon="search"
											></b-icon></router-link
										>
										
										<router-link
											:to="{name: 'home'}"
											class="badge badge-primary"
											>Edit</router-link
										>
										<DeleteBtn :FruitId="data.item.reference"></DeleteBtn>
									</div>
								</template>
								<template #cell(index)="oble">
									{{ oble.index+1 }}
								</template>
								
							</b-table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import DeleteBtn from './DeleteBtn'
export default {

	components: {
		DeleteBtn
	},
	
	data() {
		return {
			isBusy: false,
			dataTabel: [],
			kolom: [
				"index",
				{ key: "reference", label: "Reference", sortable: true },
				"type",
			],
			sortBy: "reference",
			sortDesc: false,
			filter: null,
			filterOn: [],
		};
	},

	computed: {
		sortOptions() {
			return this.fields
				.filter((f) => f.sortable)
				.map((f) => {
					return { text: f.label, value: f.key };
				});
		},
	},

	mounted() {

		this.toggleBusy();
	},

	methods: {
		onFiltered(filteredItems) {
			// Trigger pagination to update the number of buttons/pages due to filtering
			this.totalRows = filteredItems.length;
			this.currentPage = 1;
		},
		async toggleBusy() {
			this.isBusy = !this.isBusy;
			let { data } = await axios.get("/api/gudang-bahanbaku/index");
			this.raws = [];
			this.raws = data.data;
			setTimeout(this.isBusy = !this.isBusy, 6000);
		},
	},
};
</script>