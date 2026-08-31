<?php

namespace Database\Seeders;

use RuntimeException;

abstract class CsvSeeder extends \Flynsarmy\CsvSeeder\CsvSeeder
{
    public function seedFromCSV(string $filename, string $deliminator = ','): bool
    {
        $handle = $this->openCSV($filename);

        if ($handle === false) {
            throw new RuntimeException("CSV insert failed: {$filename} does not exist or is not readable.");
        }

        $rowCount = 0;
        $data = [];
        $mapping = $this->mapping;
        $offset = $this->offset_rows;

        if ($mapping !== []) {
            $this->hashable = $this->removeUnusedHashColumns($mapping);
        }

        try {
            while (($row = fgetcsv($handle, 0, $deliminator, '"', '')) !== false) {
                while ($offset-- > 0) {
                    continue 2;
                }

                if ($mapping === []) {
                    $mapping = $this->createMappingFromRow($row);
                    $this->hashable = $this->removeUnusedHashColumns($mapping);

                    continue;
                }

                $values = $this->readRow($row, $mapping);

                if ($values === []) {
                    continue;
                }

                $data[$rowCount] = $values;

                if (++$rowCount !== $this->insert_chunk_size) {
                    continue;
                }

                $this->insertOrFail($data, $filename);
                $rowCount = 0;
                $data = [];
            }

            if ($data !== []) {
                $this->insertOrFail($data, $filename);
            }
        } finally {
            fclose($handle);
        }

        return true;
    }

    /** @param array<int, array<string, mixed>> $data */
    private function insertOrFail(array $data, string $filename): void
    {
        if ($this->insert($data)) {
            return;
        }

        throw new RuntimeException("CSV insert failed for {$filename}. Check the application log for the database error.");
    }
}
