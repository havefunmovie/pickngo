<?php

namespace App\Models\Traits;

trait Metas
{
    /**
     * Check has meta for this user
     *
     * @param $key
     *
     * @return bool
     */
    public function hasMeta($key)
    {
        return $this->metas()->where(static::META_KEY, $this->id)->where('key', $key)->exists();
    }

    /**
     * Get meta with key for this user
     * - Meta does not exists: return $default
     *
     * @param      $key
     * @param null $default
     *
     * @return null
     */
    public function getMeta($key, $default = null)
    {
        if ($this->hasMeta($key)) {
            $meta = $this->metas()->where(static::META_KEY, $this->id)->where('key', $key)->latest()->first();
            return $meta->value ?: $default;
        }

        return $default;
    }

    /**
     * @param $key
     * @param null $default
     * @return |null
     */
    public function getMetas($key, $default = null)
    {
        if ($this->hasMeta($key)) {
            $metas = $this->metas()->where(static::META_KEY, $this->id)->where('key', $key)->get()->pluck('value');
            return $metas;
        }

        return $default;
    }

    /**
     * Add meat for this user
     * - Meta exists: Update meta value with value new
     *
     * @param $key
     * @param $value
     *
     * @return bool
     */
    public function addMeta($key, $value)
    {
        $result = $this->metas()->create([
            static::META_KEY => $this->id,
            'key' => $key,
            'value' => $value
        ]);

        if ($result)
            return true;

        return false;
    }

    /**
     * Update this user meta
     * - Meta does not exists: Add meta
     *
     * @param $key
     * @param $value
     *
     * @return bool
     */
    public function updateMeta($key, $value)
    {
        $meta = $this->metas()->firstOrCreate([
            static::META_KEY => $this->id,
            'key' => $key
        ]);

        $meta->value = $value;
        return $meta->save();
    }

    /**
     * Delete user meta with meta key
     *
     * @param $key
     *
     * @return mixed
     */
    public function deleteMeta($key)
    {
        return $this->metas()->where(static::META_KEY, $this->id)->where('key', $key)->delete();
    }
}
