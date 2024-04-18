import './bootstrap';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';

(function(){
    // JavaScript externo
  function confirmarEliminar(event) {
      event.preventDefault(); // Prevent default form submission
  
      // Utilizando SweetAlert para mostrar una alerta de confirmación
      Swal.fire({
          title: '¿Estás seguro?',
          text: "No podrás revertir esto",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Sí, eliminar',
          cancelButtonText: 'Cancelar'
      }).then((result) => {
          if (result.isConfirmed) {
              // Si el usuario hace clic en "Aceptar", enviar el formulario
              event.target.closest('form').submit();
          }
      });
  }
  
  // Esperar a que se cargue el DOM antes de agregar el evento
  document.addEventListener('DOMContentLoaded', function() {
      const btnEliminar = document.querySelectorAll('#eliminarComentario');
      const btnEliminarPublicacion = document.querySelector('#eliminarPublicacion');
      
      btnEliminar.forEach(button => {
          button.addEventListener('click', confirmarEliminar);
      });
      btnEliminarPublicacion.addEventListener('click', confirmarEliminar);
  });
    
}());