<template>
  <section id="side-contact-form">
    <div class="bg-white p-2 m-1 border border-warning rounded">
      <h2 class="text-warning text-center">お問い合わせ</h2>
      <form @submit.prevent="contactSubmit" @keydown="form.onKeydown($event)">
        <div>
          <has-error :form="form" field="url" />
        </div>

        <fieldset class="form-group">
          <label for="InquiryName">名前</label>
          <input
            id="InquiryName"
            v-model="form.name"
            type="text"
            class="form-control"
            :class="{ 'is-invalid': form.errors.has('name') }"
            name="name"
            placeholder="鈴木太郎"
            required
          />

          <has-error :form="form" field="name" />
        </fieldset>

        <fieldset class="form-group">
          <label for="InquiryEmail">メールアドレス</label>
          <input
            id="InquiryEmail"
            v-model="form.email"
            type="email"
            class="form-control"
            :class="{ 'is-invalid': form.errors.has('email') }"
            name="email"
            placeholder="support@example.com"
            required
          />

          <has-error :form="form" field="email" />
        </fieldset>

        <fieldset class="form-group">
          <label for="InquirySelect">簡単に言うと</label>
          <select
            id="InquirySelect"
            v-model="form.type"
            :class="{ 'is-invalid': form.errors.has('type') }"
            class="form-control"
            name="type"
          >
            <option v-for="(type, index) in types" :key="index">
              {{ type }}
            </option>
          </select>

          <has-error :form="form" field="type" />
        </fieldset>

        <fieldset class="form-group">
          <label for="InquiryTextarea">内容</label>
          <textarea
            id="InquiryTextarea"
            v-model="form.body"
            class="form-control"
            :class="{ 'is-invalid': form.errors.has('body') }"
            name="body"
            rows="4"
            required
          ></textarea>

          <has-error :form="form" field="body" />
        </fieldset>

        <div class="form-group row">
          <div class="col-md-7 offset-md-3 d-flex">
            <!-- Submit Button -->
            <v-button :loading="form.busy">
              {{ $t('update') }}
            </v-button>
          </div>
        </div>
      </form>
    </div>
  </section>
</template>

<script>
import Form from 'vform'
import axios from 'axios'

export default {
  name: 'ContactForm',

  data() {
    return {
      types: ['aaa', 'bbb', 'ccc'],
      form: new Form({
        name: '',
        email: '',
        type: '',
        body: '',
        url: '',
        token: ''
      })
    }
  },

  async mounted() {
    const types = await axios.get(`${process.env.apiUrl}/inquiry/types`)
    this.types = types.data
    this.form.url = process.env.appUrl + this.$route.fullPath
    await this.$recaptcha.init()
  },

  methods: {
    async contactSubmit() {
      let data

      try {
        const token = await this.$recaptcha.execute(this.$route.name)
        this.form.token = token
        const response = await this.form.post(`/inquiry`)
        data = response.data
      } catch (err) {
        return
      }

      // Redirect
      this.$router.push({ name: 'complete' })
    }
  }
}
</script>
