<template>
    <div class="general">
        <calendari-component />
        <!-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Calendario</div>

                    <div class="card-body">
                        I'm an example component.

                    </div>
                </div>



            </div>
        </div> -->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                greeting: 'Hello'
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss" scoped>

.general {
    padding: 5%;
}

</style>
