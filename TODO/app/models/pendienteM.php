<?php

class pendienteM
{
    private $lista = [
        [
            'id' => 1,
            'titulo' => 'lavar',
            'descripcion' => 'lavar el auto',
            'estaFinalizada' => false
        ],
        [
            'id' => 2,
            'titulo' => 'cocinar',
            'descripcion' => 'preparar el desayuno',
            'estaFinalizada' => false
        ],
        [
            'id' => 3,
            'titulo' => 'limpiar',
            'descripcion' => 'limpiar el patio',
            'estaFinalizada' => false
        ]
    ];

    private $id = 0;
    public function create($titulo, $descripcion, $estaFinalizada)
    {
        $id = $this->id++;
        $this->lista[] = [
            'id' => $id + 1,
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'estaFinalizada' => $estaFinalizada
        ];
    }
    public function getById($id)
    {
        foreach ($this->lista as $propiedad) {
            if ($propiedad['id'] == $id) {
                return $propiedad;
            }
        }
    }
    public function getAll()
    {
        return $this->lista;
    }
    public function deleteById($id)
    {
        foreach ($this->lista as $index => $elemento) {
            if ($elemento['id'] == $id) {
                unset($this->lista[$index]);
                $this->lista = array_values($this->lista);
                break;
            }
        }
    }

    public function editTitulo($id, $nTitulo)
    {
        foreach ($this->lista as $index => $elemento) {
            if ($elemento['id'] == $id) {
                $this->lista[$index]['titulo'] = $nTitulo;

                return $this->lista[$index];
            } else {
                return FALSE;
            }
        }
    }
}
