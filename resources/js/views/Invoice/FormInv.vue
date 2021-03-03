<template>
	<div class="card">
		<div class="card-body">
			<h6 class="card-title">Penambahan data invoice</h6>
			<form method="post" class="forms-sample" @submit.prevent="store">
				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label"
						>SUPPLIER NAME </label
					>
					<div class="col-sm-9">
						<v-select @input="setSupplier" :options="inv_options" label="title">
							<template #list-footer>
								<div style="background: grey; height: 1px"></div>
								<div class="costum-footer-dropdown">
									<div>
										<li style="text-align: center; text-justify: center">
											<b-button
												@click="$router.push({ name: 'inv.form' })"
												variant="primary"
												class="btn btn-xs"
												v-b-modal.modal-1
												>Add supplier</b-button
											>
										</li>
									</div>
								</div>
							</template>
						</v-select>
						<div v-if="theErrors.supplier_id" class="mt-2 text-danger">
							{{ theErrors.supplier_id[0] }}
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">Note</label>
					<div class="col-sm-9">
						<textarea
							v-model="form.note"
							class="form-control"
							id="name"
							placeholder="Tambahkan catatan jika ada"
							rows="5"
						></textarea>
					</div>
				</div>

				<div class="my-grid">
					<div>
						<button type="submit" class="btn btn-primary mr-2">Submit</button>
					</div>
					<div>
						<router-link
							class="btn btn-outline-secondary"
							:to="{ name: 'bb.form' }"
							>Back</router-link
						>
					</div>
				</div>
			</form>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			form: {
				supplier_id: "",
				note: "",
				supplier_shortname: "",
			},
			theErrors: [],
			inv_options: [],
		};
	},

	mounted() {
		this.getSupplier();
	},

	methods: {
		setSupplier(value){
			this.form.supplier_id = value.id
			this.form.supplier_shortname = value.shortname
		},
		async getSupplier() {
			let { data } = await axios.get("/api/supplier/index");
			this.inv_options = data.data;
		},
		async store() {
			// console.log(this.form);
			try {
				let response = await axios.post("/api/invoice/add-invoice", this.form);
				if (response.status == 200) {
					this.form.name = "";
					this.form.note = "";
					this.form.supplier_shortname = "";
					this.theErrors = [];
					this.$router.push({ name: "bb.form" });
					this.$toast.success("1 record has been saved!", "Done, ", {
						position: "topRight",
					});
					//  console.log(response.status);
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
