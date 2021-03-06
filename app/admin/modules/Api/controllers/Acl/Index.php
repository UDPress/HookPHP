<?php
class Acl_IndexController extends Base\ApiController
{
    public function getAction()
    {
        $data = $this->model->get();
        foreach ($data as &$v) {
            $v['group_id'] = $this->model->getData('hp_acl_group', $v['group_id'], $_SESSION[APP_NAME]['lang_id'])['name'];
            $v['resource_id'] = $this->model->getData('hp_acl_resource', $v['resource_id'], $_SESSION[APP_NAME]['lang_id'])['name'];
            $v['status'] = l('status.'.$v['status']);
        }
        return $this->send($data);
    }
}