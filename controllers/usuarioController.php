<?php
require_once './models/Usuario.php';
require_once './models/Entidad.php';
class usuarioController
{
    public function index()
    {
        require_once './views/usuario/login.php';
    }

    public function pacientesAsignados()
    {
        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './views/usuario/pacientesAsignados.php';
    }

    public function home()
    {
        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './admin/layout/footer.php';
    }

    public function estado()
    {
        if (isset($_POST['status'])) {
            $status = $_POST['status'];
            $id = $_POST['id'];
            $usuario = new Usuario();
            $usuario->setEstadoUs($status);
            $usuario->setIdUsuario($id);
            $data = $usuario->Inactive();
        }
        echo json_encode($data);
    }

    public function changePassword()
    {
        if (isset($_POST)) {
            $id =  isset($_POST['idUser']) ? filter_var($_POST['idUser'], FILTER_SANITIZE_NUMBER_INT) : false;
            $pass = isset($_POST['pass']) ? filter_var($_POST['pass'], FILTER_SANITIZE_STRING) : false;
            $newpass = isset($_POST['newpass']) ? filter_var($_POST['newpass'], FILTER_SANITIZE_STRING) : false;

            if ($pass == $newpass) {
                $new_pass = new Usuario();
                $new_pass->setIdUsuario($id);
                $new_pass->setPassword($pass);
                $data = $new_pass->changePassword();
            }
        }
        echo json_encode($data);
    }

    public function registros()
    {
        $usuarios = new Usuario();
        $data = $usuarios->getAll();
        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './views/usuario/usuarios.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? filter_var($_POST['nombre'], FILTER_SANITIZE_STRING) : false;
            $apellidos = isset($_POST['apellidos']) ? filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING) : false;
            $rol = isset($_POST['rol']) ? filter_var($_POST['rol'], FILTER_SANITIZE_STRING) : false;
            $entidad_id = isset($_POST['entidad_id']) ? filter_var($_POST['entidad_id'], FILTER_VALIDATE_INT) : false;
            $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : false;
            $password = isset($_POST['pass']) ? filter_var($_POST['pass'], FILTER_SANITIZE_STRING) : false;

            $usuario = new Usuario();
            $usuario->setNombreUs($nombre);
            $usuario->setApellidosUs($apellidos);
            $usuario->setRol($rol);
            $usuario->setEntidadId($entidad_id);
            $usuario->setEmailUs($email);
            $usuario->setPassword($password);

            if ($_POST['action'] == 'create') {
                $save = $usuario->save();
            } else {
                $id = isset($_POST['usuario_id']) ? filter_var($_POST['usuario_id'], FILTER_VALIDATE_INT) : false;
                $usuario->setIdUsuario($id);
                $save = $usuario->edit();
            }
        }
        echo json_encode($save);
    }

    public function editar()
    {
        if (isset($_GET['id'])) {
            $user_id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : false;
            $user = new Usuario();
            $user->setIdUsuario($user_id);
            $data = $user->getOne();
            //se traen las entidades disponibles
            $ent = new Entidad();
            $entidad = $ent->getAll();
            require_once './admin/layout/header.php';
            require_once './admin/layout/sidebar.php';
            require_once './views/usuario/registro.php';
            require_once './admin/layout/footer.php';
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : false;
            $usuario = new Usuario();
            $usuario->setIdUsuario($id);
            $data = $usuario->delete();
        }
        echo json_encode($data);
    }

    public function registro()
    {
        $ent = new Entidad();
        $entidad = $ent->getAll();
        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './views/usuario/registro.php';
    }

    public function login()
    {
        if (isset($_POST)) {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
            $usuario = new Usuario();
            $usuario->setEmailUs($email);
            $usuario->setPassword($pass);

            $identity = $usuario->login();

            if ($identity && is_object($identity['data'])) {
                if ($identity['data']->estado_us == 1) {
                    $_SESSION['identity'] = $identity['data'];

                    if ($identity['data']->rol == 'admin') {
                        $_SESSION['admin'] = true;
                    }
                } else {
                    $_SESSION['error_login'] = 'Identificacion fallida';
                }
            } else {
                $_SESSION['error_login'] = 'Identificacion fallida';
            }
        }
        echo json_encode($identity);
    }

    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        if (isset($_SESSION['ingreso'])) {
            unset($_SESSION['ingreso']);
        }
        header("Location:" . base_url);
    }
}
