<?php

namespace Happyphper\LaravelBestSign\Map;

interface Map
{
    //添加 key-value 数据
    public function add($key, $value): void;

    public function contains($key): bool;

    public function get($key);
    //修改 key-value 数据
    public function set($key, $value);

}
