import { useMemo, useState } from "react";
// import { PageProps } from "@/types";


interface Attachment {
    id: number;
    file_name: string;
    file_type: string;
    size: number;
    uploaded_by: string;
    created_at: string;
}

interface Props {
    columns: string[];
    data: Attachment[];
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

    // Client state (for optional toggle)
    const [visibleColumns, setVisibleColumns] = useState(columns);

    const filteredColumns = useMemo(() => {
        return allColumns.filter(col =>
            visibleColumns.includes(col.key)
        );
    }, [visibleColumns]);

    return (
        <div className="p-6">

            <h1 className="text-xl font-bold mb-4">
                Attachments
            </h1>

            {/* Optional client toggle */}
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
                        <span className="ml-1">{col}</span>
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
                    {data.map(row => (
                        <tr key={row.id}>
                            {filteredColumns.map(col => (
                                <td key={col.key} className="p-2 border">
                                    {(row as any)[col.key]}
                                </td>
                            ))}
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}
