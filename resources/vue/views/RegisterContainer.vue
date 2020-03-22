<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <registrer-form @onSubmit="onSubmit" />
      </div>
    </div>
  </div>
</template>

<script>
import RegisterForm from "@/components/RegisterForm";
import User from "@/api/user";

export default {
  components: {
    "registrer-form": RegisterForm
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    onSubmit(val) {
      console.log(val);
      User.post(val)
        .then(response => {
          this.$swal({
            type: "warning",
            text: "Datos guardados correctamente."
          });
          window.location.href = "/home";
        })
        .catch(error => {
          this.$swal({
            type: "error",
            text: "Ocurrio un error al guardar los datos."
          });
        });
    }
  }
};
</script>
