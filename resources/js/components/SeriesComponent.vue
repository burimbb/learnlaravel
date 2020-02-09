<template>
    <div @mouseover='isActive = true' @mouseout='isActive = false'>
        <a class="navbar-item">
            Documentation
        </a>

        <portal to="navigation">
            <div v-show="isActive" class="h-25 w-100 bg-white position-absolute" style="z-index:10"
                @mouseover='isActive = true' @mouseout='isActive = false'>
                <div class="container mx-auto">
                    <div class="columns">
                        <div class="column">
                            <div class="menu">
                                <p class="menu-label">
                                    General
                                </p>
                                <p class="menu-label">
                                    General
                                </p>
                                <p class="menu-label">
                                    General
                                </p>
                                <p class="menu-label">
                                    General
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </portal>
    </div>
</template>

<script>
export default {
    data(){
        return {
            isActive: false,
        }
    }
}
</script>