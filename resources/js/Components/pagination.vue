<template>
<div>
    <link rel="stylesheet" href="../../css/admin/pagination.css" />


    <div v-if="links.length > 3" class="pagination_container">

      <div class="flex flex-wrap -mb-1">

        <template v-for="(link, k) in links" :key="k">

          <div v-if="link.url === null"  class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />

          <Link v-else class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'hover_page': link.active }" :href="link.url+'&search_product='+search_product+'&categ='+categ+'&subcateg='+subcateg" v-html="link.label" />

        </template>

      </div>

    </div>
</div>

  </template>



  <script>

  export default {

    props: {

      links: Array,
      search_product:String,
      subcateg:String,
      categ:String

    },

  }

  </script>
