<?php
namespace Aliyun\Oss;

use League\Flysystem\Adapter\AbstractAdapter;
use League\Flysystem\Adapter\Polyfill\NotSupportingVisibilityTrait;
use League\Flysystem\Config;
use OSS\OssClient;

class Adapter extends AbstractAdapter{
	use NotSupportingVisibilityTrait;
	protected $client;
	protected $bucket;
	public function __construct(OssClient $client, string $bucket = '')
	{
		$this->client = $client;
		$this->bucket = $bucket;
	}
	/**
	 * {@inheritdoc}
	 */
	public function write($path, $contents, Config $config)
	{
		return $this->upload($path, $contents);
	}
	/**
	 * {@inheritdoc}
	 */
	public function writeStream($path, $resource, Config $config)
	{
	}
	/**
	 * {@inheritdoc}
	 */
	public function update($path, $contents, Config $config)
	{
		return $this->upload($path, $contents);
	}
	/**
	 * {@inheritdoc}
	 */
	public function updateStream($path, $resource, Config $config)
	{
	}
	/**
	 * {@inheritdoc}
	 */
	public function rename($path, $newPath): bool
	{
	}
	/**
	 * {@inheritdoc}
	 */
	public function copy($path, $newpath): bool
	{
	}
	/**
	 * {@inheritdoc}
	 */
	public function delete($path): bool
	{
	}
	/**
	 * {@inheritdoc}
	 */
	public function deleteDir($dirname): bool
	{
	}
	/**
	 * {@inheritdoc}
	 */
	public function createDir($dirname, Config $config)
	{
	}
	/**
	 * {@inheritdoc}
	 */
	public function has($path)
	{
	}
	/**
	 * {@inheritdoc}
	 */
	public function read($path)
	{
	}
	/**
	 * {@inheritdoc}
	 */
	public function readStream($path)
	{
	}
	/**
	 * {@inheritdoc}
	 */
	public function listContents($directory = '', $recursive = false): array
	{
	}
	/**
	 * {@inheritdoc}
	 */
	public function getMetadata($path)
	{
	}
	/**
	 * {@inheritdoc}
	 */
	public function getSize($path)
	{
	}
	/**
	 * {@inheritdoc}
	 */
	public function getMimetype($path)
	{
	}
	/**
	 * {@inheritdoc}
	 */
	public function getTimestamp($path)
	{
	}
	public function getTemporaryLink(string $path): string
	{
	}
	public function getThumbnail(string $path, string $format = 'jpeg', string $size = 'w64h64')
	{
	}
	/**
	 * {@inheritdoc}
	 */
	public function applyPathPrefix($path): string
	{
	}
	public function getClient(): OssClient
	{
		return $this->client;
	}
	/**
	 * @param string $path
	 * @param resource|string $contents
	 * @param string $mode
	 *
	 * @return array|false file metadata
	 */
	protected function upload(string $path, $contents)
	{
		try {
			return $this->client->putObject($this->bucket,$path, $contents);
		} catch (\Exception $e) {
			return false;
		}
	}
}