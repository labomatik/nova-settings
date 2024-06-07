import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-nova-settings', IndexField)
  app.component('detail-nova-settings', DetailField)
  app.component('form-nova-settings', FormField)
})
