<?php

class tareaM
{


    public function nuevaTarea($titulo, $descripcion, $estado)
    {

        if (!isset($_SESSION['tareas'])) {
            $_SESSION['tareas'] = [];
        }
        if (!isset($_SESSION['tarea_id'])) {
            $_SESSION['tarea_id'] = 1;
        }
        $_SESSION['tareas'][] = [
            'id' => $_SESSION['tarea_id'],
            'userId' => $_SESSION['sesion']['userId'],
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'estaFinalizada' => false
        ];
        $_SESSION['tarea_id']++;
        return;
    }

    public function cambiarEstado($id)
    {
        foreach ($_SESSION['tareas'] as $index => $elemento) {
            if ($elemento['id'] === $id) {
                $_SESSION['tareas'][$index]['estaFinalizada'] = !$_SESSION['tareas'][$index]['estaFinalizada'];
            }
        }
        return null;
    }
    public function obtenerTareaPorId($id)
    {

        foreach ($_SESSION['tareas'] as $propiedad) {
            if ($propiedad['id'] === $id) {
                return $propiedad;
            }
        }
        return null;
    }
    public function editarTitulo($id, $nuevoValor)
    {
        foreach ($_SESSION['tareas'] as $index => $elemento) {
            if ($elemento['id'] == $id) {
                $_SESSION['tareas'][$index]['titulo'] = $nuevoValor;
                break;
            }
        }
    }
    public function editarDescripcion($id, $nuevoValor)
    {
        foreach ($_SESSION['tareas'] as $index => $elemento) {
            if ($elemento['id'] == $id) {
                $_SESSION['tareas'][$index]['descripcion'] = $nuevoValor;
                return  $_SESSION['tareas'];
            } else {
                return false;
            }
        }
    }
    public function eliminarPorId($id)
    {
        foreach ($_SESSION['tareas'] as $index => $elemento) {
            if ($elemento['id'] == $id) {
                unset($_SESSION['tareas'][$index]);
                $_SESSION['tareas'] = array_values($_SESSION['tareas']);
                break;
            }
        }
    }

    public function mostrarTareas()
    {

        if (!isset($_SESSION['tareas'])) {
            return false;
        } else {
            return $_SESSION['tareas'];
        }
    }
    public function mostrarTareasPorUsuario($idUsuario)
    {
        if (!isset($_SESSION['tareas'])) {
            return false;
        } else {
            foreach ($_SESSION['tareas'] as $propiedad) {
                if ($propiedad['userId'] === $idUsuario) {
                    return $propiedad;
                }
            }
        }
    }
}
