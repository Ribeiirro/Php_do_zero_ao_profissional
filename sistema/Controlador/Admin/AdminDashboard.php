<?php

namespace sistema\Controlador\Admin;

/**
 * Classe AdminDashboard
 *
 * @author Ronaldo Aires
 */
class AdminDashboard extends AdminControlador
{
    public function dashboard():void
    {
        echo $this->template->renderizar('dashboard.html', []);
    }
}
