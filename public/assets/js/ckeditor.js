
// ClassicEditor.create( document.querySelector( '#editor' ), {
//                     plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
//                     toolbar: [
// 						'undo', 'redo', '|', 'bold', 'italic', '|',
// 						'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
//                     ]
//                 } )
//                 .then( editor => {
//                     window.editor = editor;
//                 } )
//                 .catch( error => {
//                     console.error( error );
//                 } );

window.addEventListener("load", (e)=>{
    ClassicEditor.create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
});