<template>
	<div class="pages filter-page">
		<AppFilter @searched="doSearch" />
		<AppCardsItems :professionalItems="professionalList"/>

		<div class="pagination field-button d-flex justify-content-center align-items-center">
			<button @click="gotoPrevious()"> Prev </button>
			<button disabled> {{ pagination.currentPage }}</button>
			<button @click="gotoPrevious()"> next </button>
		</div>
	</div>
</template>


<script>
import AppFilter from '@/components/AppFilter';
import AppCardsItems from '@/components/AppCardsItems';
import axios from "axios";

export default {
	name: 'search',
	components: {
		AppFilter,
		AppCardsItems
	},
	data: function () {
		return {
			pagination: {
				currentPage: 1,
				lastPage: 1,
				total: 0,
				perPage: 20,
				search: null
			},
			professionalList: []
		};
	},
	watch: {
		'pagination.search'() {
			this.reloadList();
		},
		'pagination.perPage'() {
			this.reloadList();
		},
		'pagination.currentPage'() {
			this.reloadList();
		}
	},
	methods: {
		gotoPrevious() {
			if (this.pagination.currentPage > 1) {
				this.pagination.currentPage--;
			}
		},
		gotoNext() {
			if (this.pagination.currentPage < this.pagination.lastPage) {
				this.pagination.currentPage++;
			}
		},
		doSearch(searchedString) {
			this.pagination.search = searchedString;
		},
		async reloadList() {
			let params = {
				'per-page': this.pagination.perPage,
				'page': this.pagination.currentPage
			};

			if (this.pagination.search != null && this.pagination.search != '') {
				params.search = this.pagination.search;
			}

			let response = await this.getFromAPI(`/professionals`, params);

			console.log('LISTA:', response.data);

			this.professionalList = response.data,
			this.pagination.total = response.total;
			this.pagination.lastPage = response.last_page;

		}
	},
	async mounted() {
		await this.reloadList();

	}
};
</script>