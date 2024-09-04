
<script setup>

const clickMe = () => {
    alert("Clicked!");
};



</script>

<template>
  <div>
    <h1>Listado de Post</h1>
    <o-field label="Email" variant="danger" message="This email is invalid">
        <o-input type="email" value="john@" :maxlength="30" />
    </o-field>
    <o-button
        @click="clickMe">
        Click Me
    </o-button>
  </div>
</template>
