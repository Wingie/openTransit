<?php
App::uses('AppController', 'Controller');
/**
 * Routes Controller
 *
 * @property Route $Route
 */
class RoutesController extends AppController {
public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Route.id' => 'desc'
        )
    );
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Route->recursive = 0;
		$this->set('routes', $this->paginate());
	}

	//displays a maps 
	public function disp($id = null) {
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			//throw new NotFoundException(__('Invalid route'));
			
		}
		
		$this->set('routes', $this->Route->find('all',array(
        'conditions' => array('Bus.id' => $id))
		));
		
		$this->set('list', $this->Route->find('all',array(
        'conditions' => array('Route.run_order' => '0'))
		));
		
	}
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
	
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__('Invalid route'));
		}
		$this->set('route', $this->Route->read(null, $id));
	}

/**
 * add method
 *	n_krishnaprakash@cb.amrita.edu
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Route->create();
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__('The route has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The route could not be saved. Please, try again.'));
			}
		}
		$buses = $this->Route->Bus->find('list');
		$stations = $this->Route->Station->find('list');
		$this->set(compact('buses', 'stations'));
	}
	
	public function myadd($id = null) {
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__('Invalid route'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			//var_dump($this->request->data);
			//**
			$conditions = array('Bus.id' => $this->request->data['Route']['bus_id'],
								'Route.run_order > ?' => ($this->request->data['Route']['run_order']-1)
			);		
			$x = ($this->Route->find('all',array('conditions' => $conditions)));
			foreach ($x as $y):
				$y['Route']['run_order']+=1;
				$this->Route->save($y);
			endforeach;
			//**
			$this->request->data['Route']['id']=null;
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__('The route has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The route could not be saved. Please, try again.'));
			}
		} 		
		else {
			$this->request->data = $this->Route->read(null, $id);
			$this->request->data['Route']['run_order'] +=1;
		}
		$buses = $this->Route->Bus->find('list');
		$stations = $this->Route->Station->find('list');
		$this->set(compact('buses', 'stations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__('Invalid route'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__('The route has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The route could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Route->read(null, $id);
		}
		$buses = $this->Route->Bus->find('list');
		$stations = $this->Route->Station->find('list');
		$this->set(compact('buses', 'stations'));
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
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__('Invalid route'));
		}
		if ($this->Route->delete()) {
			$this->Session->setFlash(__('Route deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Route was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
