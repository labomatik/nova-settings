<template>
  <DefaultField
    :field="field"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>

        <!-- -->
        <input
            :id="field.attribute"
            type="checkbox"
            :class="'custom-color custom-toggle'"
            :style.checked="this.field.color ? 'color:' +  this.field.color :  'color:#0C53FC;'"
            :placeholder="field.name"
            v-model="value"
            v-bind:true-value="1" v-bind:false-value="0"
        />


    </template>
  </DefaultField>
</template>

<script>
import {FormField, HandlesValidationErrors} from 'laravel-nova'

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ['resourceName', 'resourceId', 'field'],

  methods: {
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {

      if(this.field.value) {
        this.value = 1
      } else {
        this.value = 0
      }
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.fieldAttribute, this.value || '')
    },
  },
}
</script>
