import { useMemo, useState } from "react";

interface Props {
    columns: string[];
    data: Record<string, any>[];
}

export default function Index({ columns, data }: Props) {
    const allColumns = [
        { key: "id", label: "ID" },
        { key: "file_name", label: "File Name" },
        { key: "file_type", label: "Type" },
        { key: "size", label: "Size" },
        { key: "uploaded_by", label: "Uploaded By" },
        { key: "created_at", label: "Created At" },
    ];

    const [visibleColumns, setVisibleColumns] = useState<string[]>(columns);

    const filteredColumns = useMemo(() => {
        return allColumns.filter(col =>
            visibleColumns.some(vc => vc.split('.').pop() === col.key)
        );
    }, [visibleColumns]);

    return (
        <div className="p-6">
            <h1 className="text-xl font-bold mb-4">Attachments</h1>

            <div className="mb-4">
                {columns.map(col => (
                    <label key={col} className="mr-4">
                        <input
                            type="checkbox"
                            checked={visibleColumns.includes(col)}
                            onChange={() => {
                                setVisibleColumns(prev =>
                                    prev.includes(col)
                                        ? prev.filter(c => c !== col)
                                        : [...prev, col]
                                );
                            }}
                        />
                        <span className="ml-1">{col.split('.').pop()}</span>
                    </label>
                ))}
            </div>

            <table className="w-full border border-gray-300">
                <thead className="bg-gray-100">
                    <tr>
                        {filteredColumns.map(col => (
                            <th key={col.key} className="p-2 border">
                                {col.label}
                            </th>
                        ))}
                    </tr>
                </thead>
                <tbody>
                    {data.map((row, index) => (
                        <tr key={index}>
                            {filteredColumns.map(col => (
                                <td key={col.key} className="p-2 border">
                                    {row[col.key] ?? "-"}
                                </td>
                            ))}
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}
