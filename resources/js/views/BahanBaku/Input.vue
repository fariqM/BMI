<template>
	<div class="card">
		<div class="card-body">
			<h6 class="card-title">Tambahkan Raw</h6>
			<form method="post" class="forms-sample" @submit.prevent="store">
				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label"
						>STRUCTURE CATEGORY
					</label>
					<div class="col-sm-9">
						<v-select
							class="style-chooser"
							@input="setStructure"
							:options="category_option"
							label="title"
						>
							<template #list-footer>
								<div style="background: grey; height: 1px"></div>
								<div class="costum-footer-dropdown">
									<div>
										<li style="text-align: center; text-justify: center">
											<b-button
												@click="$router.push({ name: 'str.form' })"
												variant="primary"
												class="btn btn-xs"
												v-b-modal.modal-1
												>Add structure category</b-button
											>
										</li>
									</div>
								</div>
							</template>
						</v-select>
						<div v-if="theErrors.name" class="mt-2 text-danger">
							{{ theErrors.name[0] }}
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="size" class="col-sm-3 col-form-label">SIZE</label>

					<div class="col-sm-9">
						<input
							v-model="form.size"
							type="number"
							class="form-control"
							id="size"
							value="0"
						/>

						<div v-if="theErrors.size" class="mt-2 text-danger">
							{{ theErrors.size[0] }}
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="nop" class="col-sm-3 col-form-label">NOP</label>

					<div class="col-sm-9">
						<input
							v-model="form.nop"
							type="number"
							class="form-control"
							id="nop"
							value="0"
						/>
						<div v-if="theErrors.nop" class="mt-2 text-danger">
							{{ theErrors.nop[0] }}
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">SUPPLIER </label>
					<div class="col-sm-9">
						<v-select
							@input="setSupplier"
							:options="supplier_option"
							label="title"
							append-to-body
							:calculate-position="withPopper"
						>
							<template #list-footer>
								<div style="background: grey; height: 1px"></div>
								<div class="costum-footer-dropdown">
									<div>
										<li style="text-align: center; text-justify: center">
											<b-button
												@click="$router.push({ name: 'spl.form' })"
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
					<label for="name" class="col-sm-3 col-form-label">INVOICE </label>
					<div class="col-sm-9">
						<v-select
							@input="setInvoice"
							:options="invoice_option"
							label="title"
							append-to-body
							:calculate-position="withPopper"
						>
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
												>Add virtual invoice</b-button
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

				<div class="my-grid">
					<div>
						<button type="submit" class="btn btn-primary mr-2">Submit</button>
					</div>
					<div>
						<router-link
							class="btn btn-outline-secondary"
							:to="{ name: 'bb.index' }"
							>Kembali</router-link
						>
					</div>
				</div>
			</form>
		</div>
	</div>
</template>

<script>
import { createPopper } from '@popperjs/core'
export default {
	data() {
		return {
			form: {
				series: "",
				structure_category_id: "",
				size: "",
				uom: "m3",
				nop: "",
				supplier_id: "",
				invoice_id: "",
			},
			theErrors: [],
			invoice_option: [],
			invoice: [],
			category_option: [],
			supplier_option: [],
			placement: 'top',
		};
	},

	mounted() {
		this.getStructure();
		this.getInvoice();
		this.getSupplier();
		this.getInvoice();
	},

	methods: {
		withPopper(dropdownList, component, { width }) {
			/**
			 * We need to explicitly define the dropdown width since
			 * it is usually inherited from the parent with CSS.
			 */
			dropdownList.style.width = width;

			/**
			 * Here we position the dropdownList relative to the $refs.toggle Element.
			 *
			 * The 'offset' modifier aligns the dropdown so that the $refs.toggle and
			 * the dropdownList overlap by 1 pixel.
			 *
			 * The 'toggleClass' modifier adds a 'drop-up' class to the Vue Select
			 * wrapper so that we can set some styles for when the dropdown is placed
			 * above.
			 */
			const popper = createPopper(component.$refs.toggle, dropdownList, {
				placement: this.placement,
				modifiers: [
					{
						name: "offset",
						options: {
							offset: [0, -1],
						},
					},
					{
						name: "toggleClass",
						enabled: true,
						phase: "write",
						fn({ state }) {
							component.$el.classList.toggle(
								"drop-up",
								state.placement === "top"
							);
						},
					},
				],
			});
			return () => popper.destroy();
		},

		setSupplier(value) {
			this.form.supplier_id = value.id;
		},
		async getSupplier() {
			let { data } = await axios.get("/api/supplier/index");
			this.supplier_option = data.data;
		},

		setStructure(value) {
			this.form.series = value.shortname;
			this.form.structure_category_id = value.id;
		},
		async getStructure() {
			let { data } = await axios.get("/api/structure-category/index");
			this.category_option = data.data;
		},
		async store() {
			// console.log(this.form);

			try {
				let response = await axios.post(
					"/api/gudang-bahanbaku/add-raw",
					this.form
				);
				if (response.status == 200) {
					this.$router.push({ name: "bb.index" });
					this.$toast.success("Mantap", "Berhasil Horee!", {
						position: "topRight",
					});
					//  console.log(response.status);
				}
			} catch (e) {
				this.theErrors = e.response.data.errors;
				this.$toast.error("Ada yang error!", "Oops,", { position: "topRight" });
			}
		},

		setInvoice(value) {
			this.form.invoice_id = value.id;
		},
		async getInvoice() {
			let { data } = await axios.get("/api/invoice/index");
			this.invoice_option = data.data;
		},
	},
};
</script>

<style>
.my-grid {
	display: grid;
	grid-template-columns: 1fr auto;
}

.costum-footer-dropdown {
	margin: 5px 5px 0px 5px;
	display: grid;
	grid-template-columns: 1fr;
	justify-items: center;
	align-items: center;
}

.v-select.drop-up.vs--open .vs__dropdown-toggle {
    border-radius: 0 0 4px 4px;
    border-top-color: transparent;
    border-bottom-color: rgba(60, 60, 60, 0.26);
  }

  [data-popper-placement='top'] {
    border-radius: 4px 4px 0 0;
    border-top-style: solid;
    border-bottom-style: none;
    box-shadow: 0 -3px 6px rgba(0, 0, 0, 0.15)
  }
</style>
