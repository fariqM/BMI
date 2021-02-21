<template>
	<a ref="hapos_element" @click="konfirm" class="badge badge-danger">Hapus </a>
</template>

<script>
export default {
	props: ["FruitId"],
	data() {
		return {};
	},
	methods: {
		konfirm() {
			// console.log(this.FruitId);
			// console.log(this.$refs.hapos_element.parentNode.parentNode.parentNode.remove());

			Vue.swal({
				title: "Konfirmasi Hapus",
				html: `Apakah anda ingin menghapus post dengan judul <b>"Judul yang diimport lewat Prop"</b> ?`,
				icon: "question",
				confirmButtonText: `Haposs`,
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					this.HapusAksi();
				}
			});
		},

		async HapusAksi() {
			try {
				let response = await axios.delete(`/api/fruits/${this.FruitId}/delete`);
				if (response.status == 200) {
					this.$refs.hapos_element.parentNode.parentNode.parentNode.remove();
					Vue.swal({
						title: "Terhapus",
						icon: "success",
						showConfirmButton: true,
						timerProgressBar: true,
						timer: 3000,
						showCloseButton: true,
					});
				}
			} catch (e) {
                Vue.swal({
						title: "Oops, ada kesalahan. coba refresh tabel",
						icon: "error",
						showConfirmButton: true,
						timerProgressBar: true,
						timer: 3000,
						showCloseButton: true,
					});
            }
		},
	},
};
</script>

<style>
</style>