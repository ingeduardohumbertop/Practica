<template>
  <div>
    <b-form @submit="onSubmit">
      <fieldset>
        <legend>Registro:</legend>
        <b-form-group label="Nombre:" label-for="name">
          <b-form-input
            v-model="form.name"
            @input="$v.form.name.$touch()"
            :state="
                            $v.form.name.$dirty ? !$v.form.name.$invalid : null
                        "
          ></b-form-input>
          <b-form-invalid-feedback
            v-if="errorName"
            class="invalid-feedback d-block"
          >{{ errorName[0] }}</b-form-invalid-feedback>
        </b-form-group>
        <b-row>
          <b-col md="6">
            <b-form-group label="Apellido Paterno" label-for="first_last_name">
              <b-form-input
                v-model="form.first_last_name"
                type="text"
                @input="$v.form.first_last_name.$touch()"
                :state="
                                    $v.form.first_last_name.$dirty
                                        ? !$v.form.first_last_name.$invalid
                                        : null
                                "
              ></b-form-input>
              <b-form-invalid-feedback v-if="errorFirstName" class="invalid-feedback d-block">
                {{
                errorFirstName[0]
                }}
              </b-form-invalid-feedback>
            </b-form-group>
          </b-col>
          <b-col>
            <b-form-group label="Apellido Materno" label-for="second_last_name">
              <b-form-input
                v-model="form.second_last_name"
                type="text"
                required
                @input="$v.form.second_last_name.$touch()"
                :state="
                                    $v.form.second_last_name.$dirty
                                        ? !$v.form.second_last_name.$invalid
                                        : null
                                "
              >></b-form-input>
              <b-form-invalid-feedback v-if="errorSecondLastName" class="invalid-feedback d-block">
                {{
                errorSecondLastName[0]
                }}
              </b-form-invalid-feedback>
            </b-form-group>
          </b-col>
        </b-row>
        <b-row>
          <b-col>
            <b-form-group label="Genero:" label-for="gender">
              <b-form-select
                v-model="form.gender"
                :options="gender"
                required
                @input="$v.form.gender.$touch()"
                :state="
                                  $v.form.gender.$dirty
                                      ? !$v.form.gender.$invalid
                                      : null
                              "
              ></b-form-select>
              <b-form-invalid-feedback
                v-if="errorGender"
                class="invalid-feedback d-block"
              >{{ errorGender[0] }}</b-form-invalid-feedback>
            </b-form-group>
          </b-col>
          <b-col>
            <b-form-group label="Edad" label-for="age">
              <b-form-input
                v-model="form.age"
                type="text"
                required
                @input="$v.form.age.$touch()"
                :state="
                                    $v.form.age.$dirty
                                        ? !$v.form.age.$invalid
                                        : null
                                "
              ></b-form-input>
              <b-form-invalid-feedback
                v-if="errorAge"
                class="invalid-feedback d-block"
              >{{ errorAge[0] }}</b-form-invalid-feedback>
            </b-form-group>
          </b-col>
          <b-col>
            <b-form-group label="Estado Civil:" label-for="marital_status">
              <b-form-select
                v-model="form.marital_status"
                :options="select_marital_status"
                required
                @input="$v.form.marital_status.$touch()"
                :state="
                                    $v.form.marital_status.$dirty
                                        ? !$v.form.marital_status.$invalid
                                        : null
                                "
              ></b-form-select>
              <b-form-invalid-feedback v-if="errorMaritalStatus" class="invalid-feedback d-block">
                {{
                errorMaritalStatus[0]
                }}
              </b-form-invalid-feedback>
            </b-form-group>
          </b-col>
        </b-row>
        <b-row>
          <b-col lg="11" offset-lg="1">
            <b-form-group label="Email" label-for="email">
              <b-form-input
                v-model="form.email"
                type="email"
                required
                @input="$v.form.email.$touch()"
                :state="
                                    $v.form.email.$dirty
                                        ? !$v.form.email.$invalid
                                        : null
                                "
              ></b-form-input>
              <b-form-invalid-feedback
                v-if="errorEmail"
                class="invalid-feedback d-block"
              >{{ errorEmail[0] }}</b-form-invalid-feedback>
            </b-form-group>
            <b-form-group label="Contraseña" label-for="password">
              <b-form-input
                v-model="form.password"
                type="password"
                required
                @input="$v.form.password.$touch()"
                :state="
                                    $v.form.password.$dirty
                                        ? !$v.form.password.$invalid
                                        : null
                                "
              ></b-form-input>
              <b-form-invalid-feedback
                v-if="errorPassword"
                class="invalid-feedback d-block"
              >{{ errorPassword[0] }}</b-form-invalid-feedback>
            </b-form-group>
          </b-col>
        </b-row>
        <b-row>
          <b-col>
            <b-form-group label="Nivel de interes" label-for="marital_status">
              <b-form-select
                v-model="form.interest"
                :options="interest"
                required
                @input="$v.form.interest.$touch()"
                :state="
                                    $v.form.interest.$dirty
                                        ? !$v.form.interest.$invalid
                                        : null
                                "
              ></b-form-select>
              <b-form-invalid-feedback
                v-if="errorInterest"
                class="invalid-feedback d-block"
              >{{ errorInterest[0] }}</b-form-invalid-feedback>
            </b-form-group>
          </b-col>
        </b-row>
        <b-row>
          <b-col md="3" offset-md="9">
            <b-button
              type="submit"
              class="btn-block"
              variant="primary"
              :depressed="$v.form.$invalid"
              :disabled="$v.form.$invalid"
            >Guardar</b-button>
          </b-col>
        </b-row>
      </fieldset>
    </b-form>
    <b-card class="mt-3" header="Form Data Result">
      <pre class="m-0">{{ form }}</pre>
    </b-card>
  </div>
</template>

<script>
import { validationMixin } from "vuelidate";
import { required, email, numeric, minLength } from "vuelidate/lib/validators";
import { dictionary } from "@/utilities/ValidationDictionary";
import MaritalStatus from "@/api/maritalStatus";
import Interest from "@/api/interest";
import Gender from "@/api/gender";
export default {
  mixins: [validationMixin],
  data() {
    return {
      form: {
        name: "",
        first_last_name: "",
        second_last_name: "",
        age: "",
        gender: null,
        email: "",
        password: "",
        marital_status: null,
        interest: null
      },
      gender: [],
      select_marital_status: [],
      interest: []
    };
  },

  async created() {
    const [maritial_status, gender, interest] = await Promise.all([
      MaritalStatus.get(),
      Gender.get(),
      Interest.get()
    ]);

    this.select_marital_status = maritial_status.data.maritial_status.map(
      options => ({
        text: options.name,
        value: options.id
      })
    );
    this.gender = gender.data.gender.map(options => ({
      text: options.name,
      value: options.id
    }));

    this.interest = interest.data.interest.map(options => ({
      text: options.level,
      value: options.id
    }));
  },
  validations: {
    form: {
      name: { required },
      first_last_name: { required },
      second_last_name: { required },
      age: { required, numeric },
      gender: { required },
      email: { required, email },
      password: { required, minLength: minLength(8) },
      marital_status: { required },
      interest: { required }
    }
  },
  computed: {
    //validacion de formulario textos
    errorName() {
      let error = [];
      if (!this.$v.form.name.$dirty) {
        return error;
      }
      if (!this.$v.form.name.required) {
        error.push(dictionary.required);
      }
      return error;
    },
    errorFirstName() {
      let error = [];
      if (!this.$v.form.first_last_name.$dirty) {
        return error;
      }
      if (!this.$v.form.first_last_name.required) {
        error.push(dictionary.required);
      }
      return error;
    },
    errorSecondLastName() {
      let error = [];
      if (!this.$v.form.second_last_name.$dirty) {
        return error;
      }
      if (!this.$v.form.second_last_name.required) {
        error.push(dictionary.required);
      }
      return error;
    },
    errorAge() {
      let error = [];
      if (!this.$v.form.age.$dirty) {
        return error;
      }
      if (!this.$v.form.age.required) {
        error.push(dictionary.required);
      }
      return error;
    },
    errorGender() {
      let error = [];
      if (!this.$v.form.gender.$dirty) {
        return error;
      }
      if (!this.$v.form.gender.required) {
        error.push(dictionary.required);
      }
      return error;
    },
    errorEmail() {
      let error = [];
      if (!this.$v.form.email.$dirty) {
        return error;
      }
      if (!this.$v.form.email.required) {
        error.push(dictionary.required);
      }
      if (!this.$v.form.email.email) {
        error.push(dictionary.email);
      }
      return error;
    },
    errorPassword() {
      let error = [];
      if (!this.$v.form.password.$dirty) {
        return error;
      }
      if (!this.$v.form.password.required) {
        error.push(dictionary.required);
      }
      if (!this.$v.form.password.minLength) {
        error.push(dictionary.minLength(8));
      }

      return error;
    },
    errorMaritalStatus() {
      let error = [];
      if (!this.$v.form.marital_status.$dirty) {
        return error;
      }
      if (!this.$v.form.marital_status.required) {
        error.push(dictionary.required);
      }

      return error;
    },
    errorInterest() {
      let error = [];
      if (!this.$v.form.interest.$dirty) {
        return error;
      }
      if (!this.$v.form.interest.required) {
        error.push(dictionary.required);
      }

      return error;
    }
  },
  methods: {
    onSubmit(evt) {
      evt.preventDefault();

      if (this.$v.form.$invalid) {
        this.$v.form.$touch();
        return;
      }
      console.log(this.form);
      this.$emit("onSubmit", this.form);
    }
  }
};
</script>
