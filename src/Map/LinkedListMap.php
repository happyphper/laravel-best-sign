<?php

namespace Happyphper\LaravelBestSign\Map;

/**
 * 基于链表的映射(Map)实现
 * Class LinkedListMap
 */
class LinkedListMap implements Map
{
    public $dummyHead;
    public $size;

    public function __construct()
    {
        $this->dummyHead = new Node(null, null, null);
        $this->size = 0;
    }

    /**
     * 向链表添加数据
     * @param $key
     * @param $value
     */
    public function add($key, $value): void
    {
        $node = $this->getNode($key);
        if ($node == null) {
            $this->dummyHead->next = new Node($key, $value, $this->dummyHead->next);
            $this->size++;
        } else {
            $node->value = $value;
        }
    }

    /**
     * 判断 Map 是否包含 key
     * @param $key
     * @return bool
     */
    public function contains($key): bool
    {
        $node = $this->getNode($key);
        if ($node == null) {
            return false;
        }
        return true;
    }

    public function get($key)
    {
        $node = $this->getNode($key);
        return isset($node) ? $node : null;
    }

    public function set($key, $value)
    {
        $node = $this->getNode($key);
        if ($node == null) {
            echo "不存在 key:" . $key;
            exit;
        }
        $node->value = $value;
    }

    public function remove($key)
    {
        $value = null;
        for ($node = $this->dummyHead; $node != null; $node = $node->next) {
            if ($node->next != null && $node->next->key == $key) {
                $reNode = $node->next->value;
                $node->next = $node->next->next;
                $this->size--;
                break;
            }
        }

        return $value;
    }

    /**
     * 遍历链表获取某个key=$key的节点
     * @param $key
     * @return |null
     */
    private function getNode($key)
    {
        for ($node = $this->dummyHead->next; $node != null; $node = $node->next) {
            if ($node->key == $key) {
                return $node;
            }
        }
        return null;
    }


}

/**
 * 映射节点定义
 * Class Node
 */
class Node
{
    public $key;
    public $value;
    public $next;

    public function __construct($key, $value, $next)
    {
        $this->key = $key;
        $this->value = $value;
        $this->next = $next;
    }
}
