<?php
App::uses('AppController', 'Controller','RouteController');
/**
 * Buses Controller
 *
 * @property Bus $Bus
 */
class BusesController extends AppController {
var $helpers = array('Html','Form', 'Time','Paginator'); 
 
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Bus->recursive = 0;
		$this->set('buses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Bus->id = $id;
		if (!$this->Bus->exists()) {
			throw new NotFoundException(__('Invalid bus'));
		}
		$this->set('bus', $this->Bus->read(null, $id));
		
				  
		$v = $this->Bus->Route->find('all',array(
        'conditions' => array('Bus.id' => $id),'order' => array('Route.run_order ASC'),)
		);
		$this->set('routes',$v);
		
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bus->create();
			if ($this->Bus->save($this->request->data)) {
				$this->Session->setFlash(__('The bus has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bus could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Bus->id = $id;
		if (!$this->Bus->exists()) {
			throw new NotFoundException(__('Invalid bus'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Bus->save($this->request->data)) {
				$this->Session->setFlash(__('The bus has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bus could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Bus->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Bus->id = $id;
		if (!$this->Bus->exists()) {
			throw new NotFoundException(__('Invalid bus'));
		}
		if ($this->Bus->delete()) {
			$this->Session->setFlash(__('Bus deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Bus was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
