<template>
	<div class="card">
		<div class="card-body">
			<h6 class="card-title">Tambahkan Fruits</h6>
			<form method="post" class="forms-sample" @submit.prevent="update">
				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">Nama</label>
					<div class="col-sm-9">
						<input
							maxlength="15"
							type="text"
							v-model="form.name"
							class="form-control costum-validation-input"
							id="name"
							placeholder="Email"
						/>
						<div v-if="theErrors.name" class="mt-2 text-danger">
							{{ theErrors.name[0] }}
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="varian" class="col-sm-3 col-form-label">Varian</label>
					<div class="col-sm-9">
						<input
							type="text"
							maxlength="15"
							id="varian"
							v-model="form.varian"
							class="form-control costum-validation-input"
							autocomplete="off"
							placeholder="Varian"
						/>
						<div v-if="theErrors.varian" class="mt-2 text-danger">
							{{ theErrors.varian[0] }}
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="latin_name" class="col-sm-3 col-form-label"
						>Latin Name</label
					>
					<div class="col-sm-9">
						<input
							type="text"
							v-model="form.latin_name"
							class="form-control costum-validation-input"
							maxlength="15"
							id="latin_name"
							placeholder="Nama Latin"
						/>
						<div v-if="theErrors.latin_name" class="mt-2 text-danger">
							{{ theErrors.latin_name[0] }}
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="origin" class="col-sm-3 col-form-label">Origin</label>
					<div class="col-sm-9">
						<input
							type="text"
							v-model="form.origin"
							class="form-control costum-validation-input"
							maxlength="15"
							id="origin"
							autocomplete="off"
							placeholder="Asal Negara"
						/>
						<div v-if="theErrors.origin" class="mt-2 text-danger">
							{{ theErrors.origin[0] }}
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="year_found" class="col-sm-3 col-form-label"
						>Year Found</label
					>
					<div class="col-sm-9">
						<masked-input
							type="text"
							:mask="[/\d/,/\d/,/\d/,/\d/]"
							v-model="form.year_found"
							class="form-control costum-validation-input"
							maxlength="4"
							:guide="false"
							id="year_found"
							autocomplete="off"
							placeholder="Tahun ditemukan"
						/>
						<div v-if="theErrors.year_found" class="mt-2 text-danger">
							{{ theErrors.year_found[0] }}
						</div>
					</div>
				</div>

				<div class="my-grid">
					<div>
						<button type="submit" class="btn btn-primary mr-2">Submit</button>
					</div>
					<div>
						<router-link
							class="btn btn-outline-secondary"
							:to="{ name: 'pages.tes' }"
							>Kembali</router-link
						>
					</div>
				</div>
			</form>
		</div>
	</div>
</template>

<script>
import "../../../public/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js";
import "../../../public/assets/js/bootstrap-maxlength.js";

export default {
	data() {
		return {
			form: [],
			theErrors: [],
		};
	},

	mounted() {
		this.Fruit();
	},

	methods: {
		async Fruit() {
			let response = await axios.get(
				`/api/fruits/${this.$route.params.FruitId}`
			);
			this.form = response.data.data;
		},

		async update() {
			// console.log(this.form);
			try {
				let response = await axios.patch(
					`/api/fruits/${this.$route.params.FruitId}/edit`,
					this.form
				);
				if (response.status == 200) {
					this.theErrors = [];
					this.$toast.success("Mantap", "Berhasil Horee!", {
						position: "topRight",
					});

					setTimeout(() => this.$router.push({ name: "pages.tes" }), 1000);

					// setTimeout(this.$router.push({ name: 'pages.tes' }),3000)
					// router.push({ name: 'pages.tes'})
				}
			} catch (e) {
				this.theErrors = e.response.data.errors;
				this.$toast.error("Ada yang error!", "Oops,", { position: "topRight" });
			}
		},
	},
};
</script>

<style>
.my-grid {
	display: grid;
	grid-template-columns: 1fr auto;
}
</style>
