<?php

declare(strict_types=1);

namespace Models\Interfaces;

use Generator;
use Models\Exceptions\ModelException;

/**
 * Interface ModelInterface
 * @package Models\Interfaces
 */
interface ModelInterface
{
    /**
     * Gets one element using select by id and displays choosen fields.
     * Returns all fields by default if not given $displayFields parameter.
     * @param int    $id
     * @param array  $displayFields
     * @return object|null
     * @throws ModelException
     */
    public function getOneById(
        int $id,
        array $displayFields = []
    ): ?object;

    /**
     * Gets many elements using select by many ids and displays choosen fields.
     * Returns all fields by default if not given $displayFields parameter
     * and 20 elements from offset 0.
     * @param array  $ids
     * @param array  $displayFiedls
     * @param int    $limit
     * @param int    $offset
     * @return Generator|null
     * @throws ModelException
     */
    public function getManyByIds(
        array $ids,
        array $displayFiedls = [],
        int $limit = 20,
        int $offset = 0
    ): ?Generator;

    /**
     * Gets one or many elements using custom data select and displays choosen fields.
     * Returns all fields by default if not given $displayFields parameter
     * and 20 elements from offset 0.
     * @param array  $displayFields
     * @param array  $operatorKeyValue
     * @param int    $limit
     * @param int    $offset
     * @return Generator|null
     * @throws ModelException
     */
    public function getCustom(
        array $displayFields = [],
        array $operatorKeyValue = [],
        int $limit = 20,
        int $offset = 0
    ): ?Generator;

    /**
     * Gets all stored elements.
     * Returns all fields by default if not given $displayFields parameter
     * and 20 elements from offset 0.
     * @param array  $displayFields
     * @param int    $limit
     * @param int    $offset
     * @return Generator|null
     * @throws ModelException
     */
    public function getAll(
        array $displayFields = [],
        int $limit = 20,
        int $offset = 0
    ): ?Generator;

    /**
     * Inserts one element, must have data to be inserted and respect every fields data types rules.
     * Returns the inserted element id.
     * @param array  $data
     * @param array  $rules
     * @return int|null
     * @throws ModelException
     */
    public function insertOne(
        array $data,
        array $rules
    ): ?int;

    /**
     * Inserts many elements at once, must have one or many datas to be inserted
     * and respect every fields data types rules.
     * Returns the inserted elements ids in an array.
     * @param array  $datas
     * @param array  $rules
     * @return array|null
     * @throws ModelException
     */
    public function insertMany(
        array $datas,
        array $rules
    ): ?array;

    /**
     * Updates one element by his id, must have id of element to be updated and data to replace.
     * Must respect all fields data types rules.
     * Returns id of updated element or false.
     * @param int    $id
     * @param array  $data
     * @param array  $rules
     * @return int|null
     * @throws ModelException
     */
    public function updateOneById(
        int $id,
        array $data,
        array $rules
    ): ?int;

    /**
     * Updates many elements by their ids, must have array of elements ids to be updated and datas to replace.
     * Must respect all fields data types rules.
     * Returns array that contains boolean in front of each elements ids that has been updated or not.
     * @param array  $ids
     * @param array  $datas
     * @param array  $rules
     * @return array|null
     * @throws ModelException
     */
    public function updateManyByIds(
        array $ids,
        array $datas,
        array $rules,
        string $table = ''
    ): ?array;

    /**
     * Updates many elements by custum selected data, must have array of selects datas to be updated.
     * Must respect all fields data types rules.
     * Returns array that contains boolean in front of each elements ids that has been updated or not.
     * @param array  $dataSelects
     * @param array  $dataUpdates
     * @param array  $rules
     * @return array|null
     * @throws ModelException
     */
    public function updateManyByCustom(
        array $dataSelects,
        array $dataUpdates,
        array $rules
    ): ?array;

    /**
     * Deletes on element by id, must have element id to be deleted.
     * Returns boolean.
     * @param int  $id
     * @return bool
     * @throws ModelException
     */
    public function deleteOneById(int $id): bool;

    /**
     * Deletes many elements by ids, must have array of ids elements to be deleted.
     * Returns array that contains boolean in front of each elements ids that has been deleted or not.
     * @param array  $ids
     * @return array|null
     * @throws ModelException
     */
    public function deleteManyByIds(array $ids): ?array;

    /**
     * Deletes many elements by custom selets datas, must have array of datas to select elements to be deleted.
     * Returns array that contains boolean in front of each elements ids that has been deleted or not.
     * @param array  $dataSelects
     * @return array|null
     * @throws ModelException
     */
    public function deleteManyByCustom(array $dataSelects): ?array;
}
