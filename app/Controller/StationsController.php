<?php
App::uses('AppController', 'Controller');
/**
 * Stations Controller
 *
 * @property Station $Station
 */
class StationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Station->recursive = 0;
		$this->set('stations', $this->paginate());
	}

	public function disp() {
		$this->Station->recursive = 0;
		$this->set('stations', $this->paginate());
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Station->id = $id;
		if (!$this->Station->exists()) {
			throw new NotFoundException(__('Invalid station'));
		}
		$this->set('station', $this->Station->read(null, $id));
		
		$v = ($this->Station->Route->find('all',array(
        'conditions' => array('Station.id' => $id))
		));
		$this->set('buses',$v);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Station->create();
			if ($this->Station->save($this->request->data)) {
				$this->Session->setFlash(__('The station has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The station could not be saved. Please, try again.'));
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
		$this->Station->id = $id;
		if (!$this->Station->exists()) {
			throw new NotFoundException(__('Invalid station'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Station->save($this->request->data)) {
				$this->Session->setFlash(__('The station has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The station could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Station->read(null, $id);
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
		$this->Station->id = $id;
		if (!$this->Station->exists()) {
			throw new NotFoundException(__('Invalid station'));
		}
		if ($this->Station->delete()) {
			$this->Session->setFlash(__('Station deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Station was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
