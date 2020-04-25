<template>
 <div class="dropdown relative">
 <!--trigger-->
 <div class="dropdown-toggle" 
        aria-haspopup="true"
       :aria-expanded="isOpen"
       @click.prevent="isOpen=!isOpen">
      <slot name="trigger">
      </slot> 
 </div>
 <!--menu links-->

<div v-show="isOpen" 
class="dropdown-menu absolute bg-card rounded shadow py-2 mt-2 "
:class="align==='left' ? 'p-l':'p-r'"
style="{width}"
>
	<slot></slot>
</div>

 </div>
</template>



<script >
export default {
    props:{
        width:{default:'auto'},
        align:{default:'left'}
    },
    data(){
        return {isOpen:false}
    },

      watch: {
            isOpen(isOpen) {
                if (isOpen) {
                    document.addEventListener('click', this.closeIfClickedOutside);
                }
            }
        },
        methods: {
            closeIfClickedOutside(event) {
                if (! event.target.closest('.dropdown')) {
                    this.isOpen = false;
                    document.removeEventListener('click', this.closeIfClickedOutside);
                }
            }
        }
    }
</script>