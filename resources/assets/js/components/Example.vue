<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">example component!</div>

                    <div class="panel-body">
                        {{personal}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['personal', 'direccion'],
        mounted() {
            console.log(this.personal);
            console.log(this.direccion);
        }
    }
</script>
