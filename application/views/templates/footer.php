  </main> <!-- ENd of container -->
  <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
  <script>
                        ClassicEditor
                                .create( document.querySelector( '#content' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
 </body>
</html>