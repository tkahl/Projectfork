<?php
/**
* @package   Projectfork
* @copyright Copyright (C) 2006-2011 Tobias Kuhn. All rights reserved.
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL, see license.txt
*
* This file is part of Projectfork.
*
* Projectfork is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*
* Projectfork is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Projectfork. If not, see <http://www.gnu.org/licenses/gpl.html>.
**/

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');


class ProjectforkControllerProject extends JControllerForm
{
	/**
	 * Class constructor.
	 *
	 * @param	  array    $config    A named array of configuration variables
	 * @return    JControllerForm
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);
	}


    /**
     * Sets the currently active project for the user
     *
     **/
    public function setActive()
    {
        $data = array();
        $data['id'] = JRequest::GetInt('id');

        $model = $this->getModel('project');
        $app   = JFactory::getApplication();

        $model->setActive($data);

        $return = base64_decode(JRequest::getVar('return'));
        $app->redirect($return);

        return $this;
    }
}