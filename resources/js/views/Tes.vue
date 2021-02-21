<template>
	<div>
		<nav class="page-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Tables</a></li>
				<li class="breadcrumb-item active" aria-current="page">Gudang1</li>
			</ol>
		</nav>

		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Contoh Tabel</h6>
						<p class="card-description">
							Read the
							<a href="https://datatables.net/" target="_blank">
								Caption blbababla </a
							>Keterangan blablabla
						</p>
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
										value="id"
										id="kolomID"
										type="checkbox"
									/>
									<label class="costum-checkbox" for="kolomID">Id</label>

									<input
										class="costum-checkbox"
										v-model="filterOn"
										value="name"
										id="kolomTitle"
										type="checkbox"
									/>
									<label class="costum-checkbox" for="kolomTitle">Nama</label>
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
										@click="$router.push({ name: 'fruit' })"
										variant="primary"
									>
										<b-icon icon="plus-square" aria-hidden="true"></b-icon>
										Tambahkan
									</b-button>
								</div>
							</div>
						</div>
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
								:items="fruits"
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
											:to="{ name: 'edit.fruit', params: {FruitId: data.item.id} }"
											class="badge badge-info"
											><b-icon
												icon="search"
											></b-icon></router-link
										>
										
										<router-link
											:to="{name: 'edit.fruit', params: {FruitId: data.item.id} }"
											class="badge badge-primary"
											>Edit</router-link
										>
										<DeleteBtn :FruitId="data.item.id"></DeleteBtn>
									</div>
								</template>
								<template #cell(index)="oble">
									{{ oble.index+1 }}
								</template>
								<template #head(name)="">
									namaku
									<b-icon icon="chevron-bar-contract"> </b-icon>
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
			fruits: [],
			kolom: [
				"index",
				{ key: "id", label: "Id", sortable: true },
				{ key: "name", label: "Nama", sortable: true },
				"varian",
				"origin",
				"origin",
				"year_found",
				"action",
			],
			sortBy: "id",
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
		// cara pertama menampilkan data
		// axios.get("/api/notes").then((response) => {
		// 	this.notes = response.data.data;
		// 	console.log(response.data.data);
		// });

		// cara kedua menggunakan metode mirip java get and set
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
			let { data } = await axios.get("/api/fruits/index");
			this.fruits = [];
			this.fruits = data.data;
			setTimeout(this.addFruitData(), 6000);
		},
		addFruitData() {
			this.isBusy = !this.isBusy;
		},
	},
};
</script>

<style>
.container {
	margin-top: 30px;
}

.grid-container {
	display: grid;
	grid-template-columns: 2fr auto;
	margin-bottom: 5px;
}
.grid-item-container {
	display: grid;
	align-content: center;
	grid-template-columns: 1fr 3fr;
}
.grid-subitem-2 {
	/* background-color: rgb(166, 190, 26); */
	border-style: inherit;
}
/* .grid-subitem-1 {
	background-color: rgb(0, 255, 13);
}
.grid-item-1 {
	background-color: blue;
} */
/* .grid-item-2 {
	
	background-color: rgb(0, 255, 128);
} */

input.costum-input:focus {
	outline-color: #d6d6d6;
	outline: none !important;
	box-shadow: 0 0 10px #a393df;
}
input.costum-input:hover {
	outline-color: #d6d6d6;
	outline: none !important;
	box-shadow: 0 0 10px #a393df;
}

input.costum-input {
	outline-color: #d6d6d6;
	width: 100%;
	font-size: medium;
	padding-left: 10px;
	border-style: groove;
	border-color: #cfcfcf;
	text-justify: center;
	/* outline-style: initial; */
}
.grid-item-container-2 {
	display: grid;
	grid-template-columns: 1fr auto;
	gap: 5px;
}

@media screen and (max-width: 600px) {
	.grid-container {
		display: grid;
		/* background: crimson; */
		grid-template-columns: 1fr;
	}
	.grid-item-container {
		/* background: chartreuse; */
		display: grid;
		align-content: end;
		grid-template-columns: 1fr;
	}
	.grid-item-container-2 {
		/* background: darkkhaki; */
		display: grid;
		grid-template-columns: 1fr auto;
	}
}

input.asdasd {
	outline-style: ridge;
}
input.costum-checkbox {
	height: 15px;
	width: 15px;
	border-style: inherit;
	position: relative;
	top: 6px;
	margin-left: 5px;
}
input.costum-checkbox:hover {
	box-shadow: 0 0 10px #a393df;
}
input.costum-checkbox:checked {
	box-shadow: 0 0 5px #005cc8;
}

label.costum-checkbox {
	position: relative;
	top: 5px;
	-webkit-transition: all 0.7s ease-in-out;
	-webkit-transition: all 0.4s ease-in-out;
	transition: all 0.4s ease-in-out;
}
.costum-label-filter {
	position: relative;
	top: 5px;
	margin-left: 5px;
	margin-right: 5px;
}
</style>