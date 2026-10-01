<?php
declare(strict_types=1);

namespace Admin\Controller;

use Admin\Controller\AppController;

/**
 * Pages Controller
 *
 * @method \UserAdmin\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->setLayout('default');

        $this->render("index");
    }
   
}
