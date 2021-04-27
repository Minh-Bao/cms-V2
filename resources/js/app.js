
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/* require('./bootstrap');

window.Vue = require('vue'); */

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* const app = new Vue({
    el: '#app'
}); */



/**
 * Import Alpinejs dependencies
 */
import 'alpinejs'

/**
 * Import Embla css file 
 * Then parse EmblaCarousel script for the slider
 */
import EmblaCarousel from "embla-carousel";
import "../css/embla.css";
window.EmblaCarousel = EmblaCarousel;



/*********************CUSTOMBOX MODAL PLUGIN FOR WYSIWYG FRONT EDITOR ******************/

/**
 * When click a class : add html content for modal
 * Use of custombox modal plugin
 * Modal Wysiwyg front
 * 
 **/

//Parse new custombox modal and set the option
$(document).ready(function(){
    var modal = new Custombox.modal({
      content: {
        effect: 'fadein',
        target: '#sitebuilder',
      }
  });


  /**
   * Add modal html content when click on a class
   */
   $('.bloc').click(function(){
       var element = $(this).attr("name");
       var object = $(this).attr("value");
    //    console.log('{{route('sitebuilder')}}?part=bloc&object='+object+'&elem='+element);
       $('#sitebuilder').html('');
       $('#sitebuilder').load('/admin/sitebuilder?part=bloc&object='+object+'&elem='+element);
       modal.open();
  });
  
  $('.page').click(function(){
       var element = $(this).attr("name");
       var object = $(this).attr("value");
    //    console.log('{{route('sitebuilder')}}?part=page&object='+object+'&elem='+element);
       $('#sitebuilder').html('');
       $('#sitebuilder').load('/admin/sitebuilder?part=page&object='+object+'&elem='+element);
       modal.open();
  });
  
   $('.slider').click(function(){
       var element = $(this).attr("name");
       var object = $(this).attr("value");
       $('#sitebuilder').html('');
       $('#sitebuilder').load('/admin/sitebuilder?part=slider&object='+object+'&elem='+element);
       modal.open();
    //    console.log(element);
    });
  });
  


  /*********************____CUSTOMBOX MODAL PLUGIN FOR WYSIWYG FRONT EDITOR ____******************/
  

