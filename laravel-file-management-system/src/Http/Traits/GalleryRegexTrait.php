<?php

namespace Gallery\Http\Traits;

use Illuminate\Database\Query\Builder;
use LaravelHelper\Helpers\ArrayHelper;
use LaravelHelper\Helpers\CheckHelper;
use LaravelHelper\Helpers\CollectionHelper;
use LaravelHelper\Helpers\DatabaseHelper;
use LaravelHelper\Helpers\RegexHelper;

/**
 * Trait GalleryRegexTrait
 * @package Gallery\Http\Traits
 */
trait GalleryRegexTrait
{
	/**
	 * Returns regex data
	 *
	 * @param $text
	 * @return mixed
	 */
	public function getSourceData($text)
	{
		return RegexHelper::getImages($text);
	}
	
	/**
	 * Returns gallery config details via key
	 *
	 * @param $key
	 * @return \Illuminate\Config\Repository|mixed
	 */
	protected function getConf($key)
	{
		return config('gallery.' . $key);
	}
	
	/**
	 * Returns regex detail
	 *
	 * @param $text
	 * @param $column
	 * @return array
	 */
	public function sourceRegexDetail($text, $column)
	{
		$regexData = $this->getSourceData($text);
		$sourceData = $this->sourceFindSlugs($column, $regexData['sources']);
		$arrayData = ArrayHelper::getArrayElements($sourceData['data']);
		return [
			'arrayData' => $arrayData,
			'sourceData' => $sourceData,
		];
	}
	
	/**
	 * Finds page content id via the given page slugs
	 *
	 * @param $column
	 * @param $data
	 * @return array
	 */
	public function sourceFindSlugs($column, $data)
	{
		$files = $this->sourceDB($this->getConf('database.gallery.baseTable'))->get();
		if (count($files) > 0) {
			$data = RegexHelper::clearUrl($data);
			
			$willBePlucked = $files->whereIn($column, $data);
			
			$plucked = $willBePlucked->isNotEmpty() ?
				$plucked = CollectionHelper::pluckToArray(
					$willBePlucked,
					$this->getConf('model.uniqueColumn'),
					$this->getConf('model.identity')
				) :
				[];
			$notExistSources = array_diff($data, $plucked);
			return [
				'data' => $plucked,
				'notExistSources' => $notExistSources,
			];
		}
	}
	
	/**
	 * Returns internal_link query builder instance
	 *
	 * @param $table
	 * @return Builder
	 */
	public function sourceDB($table)
	{
		return DatabaseHelper::queryInstance($table);
	}
	
	/**
	 * Replace keys to values via content value
	 *
	 * @param $content
	 * @return mixed
	 */
	public function whenSourceGet($content)
	{
		$regexSourceDetail = $this->sourceRegexDetail($content, 'content_id');
		$keys = $regexSourceDetail['arrayData']['keys'];
		$values = $regexSourceDetail['arrayData']['values'];
		if (CheckHelper::isNotEmptyArray($keys) && CheckHelper::isNotEmptyArray($values)) {
			return str_replace($keys, $values, $content);
		}
	}
	
	/**
	 * Replaces old to new via content value
	 *
	 * @param $content
	 * @return mixed
	 */
	public function whenSourceSet($content)
	{
		$regexSourceDetail = $this->sourceRegexDetail(
			$content,
			$this->getConf('model.uniqueColumn')
		);
		$sourceData = $regexSourceDetail['sourceData']['data'];
		if (CheckHelper::isNotEmptyArray($sourceData)) {
			$keys = array_filter($regexSourceDetail['arrayData']['keys']);
			$values = array_filter($regexSourceDetail['arrayData']['values']);
			if (CheckHelper::isNotEmptyArray($keys)
				&& CheckHelper::isNotEmptyArray($values)
			) {
				$imageKeys = RegexHelper::getImages($content)['links'];
				$imageValues = str_replace($values, $keys, $imageKeys);
				$content = str_replace($imageKeys, $imageValues, $content);
				$content = RegexHelper::clearUrl($content);
			}
			return $content;
		}
		return $content;
	}
	
	/**
	 * Saves internal and external links to the database.
	 * You can use in model observer saved method
	 *
	 * @param $model
	 * @param $column
	 */
	public function whenSourceSaved($model, $column)
	{
		$regexLinkDetail = $this->sourceRegexDetail($model->content, $column);
		// find dynamic relationships solution notCoverFiles and files
		$notCoverFiles = $model->notCoverFiles();
		if (count($notCoverFiles) > 0) {
			foreach ($notCoverFiles as $file) {
				$file->pivot->delete();
			}
		}
		$model->files()->attach(
			$regexLinkDetail['arrayData']['keys']
		);
	}
}