<?php
class message
{
  public function successMessage($content)
  {
    echo '<script>
            document.addEventListener("DOMContentLoaded", ()=> {
              const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.onmouseenter = Swal.stopTimer;
                  toast.onmouseleave = Swal.resumeTimer;
                }
              });
              Toast.fire({
                icon: "success",
                title: ' . json_encode($content) . '
              });
            });
          </script>';
  }

  public function errorMessage($content)
  {
    echo '<script>
            document.addEventListener("DOMContentLoaded", ()=> {
              const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.onmouseenter = Swal.stopTimer;
                  toast.onmouseleave = Swal.resumeTimer;
                }
              });
              Toast.fire({
                icon: "error",
                title: ' . json_encode($content) . '
              });
            });
          </script>';
  }

  public function warningMessage($content)
  {
    echo '<script>
            document.addEventListener("DOMContentLoaded", ()=> {
              const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.onmouseenter = Swal.stopTimer;
                  toast.onmouseleave = Swal.resumeTimer;
                }
              });
              Toast.fire({
                icon: "warning",
                title: ' . json_encode($content) . '
              });
            });
          </script>';
  }
}
?>