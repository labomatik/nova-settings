<template>
  <span v-if="fieldValue">

      <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
           stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
      </svg>

  </span>
    <span v-else>

      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
           class="h-5 w-5 text-red-500">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
    </svg>

  </span>
</template>

<script>
export default {
    props: ['resourceName', 'field'],

    computed: {
        fieldValue() {
            return this.field.displayedAs || this.field.value
        },
    }
}
</script>
